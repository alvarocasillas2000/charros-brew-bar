<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Area;
use App\Models\BusinessDay;
use App\Models\AreaXGame;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\ReservationNote;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationSuccessMail;
use App\Mail\ResendedMail;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;



class ReservationController extends Controller
{
    public function show()
    {
        $businessDays = BusinessDay::whereDate('date', '>=', now()->toDateString())
            ->where('is_business_day', true)
            ->orderBy('date')
            ->get();

        // Obtener las áreas con información inicial
        $areas = Area::all()->map(function ($area) {
            return [
                'id' => $area->id,
                'name' => $area->name,
                'initial_price' => $area->cost_per_person,
                'description' => $area->description
            ];
        });

        return view('reserva', compact('businessDays', 'areas'));
    }

    public function getGameAreas($businessDayId)
    {
        $businessDay = BusinessDay::find($businessDayId);
        
        $areasData = AreaXGame::with('area')
            ->where('business_day_id', $businessDayId)
            ->get()
            ->map(function ($item) {
                // Calculate reserved quantity based on paid reservations only
                $paidReservations = $this->getPaidReservationsCount($item->business_day_id, $item->area_id);

                return [
                    'id' => $item->area_id,
                    'name' => $item->area->name,
                    'price' => $item->cost_per_person,
                    'capacity' => $item->max_capacity,
                    'reserved' => $paidReservations,
                    'available' => $item->max_capacity - $paidReservations,
                    'description' => $item->area->description
                ];
            });

        return response()->json([
            'day_type' => $businessDay ? $businessDay->day_type : null,
            'areas' => $areasData
        ]);
    }

    /**
     * Get the count of people from paid reservations for a specific business day and area
     */
    private function getPaidReservationsCount($businessDayId, $areaId)
    {
        return Reservation::whereHas('payment', function ($query) {
                $query->where('status', 'completed');
            })
            ->where('business_day_id', $businessDayId)
            ->where('area_id', $areaId)
            ->sum('people_count');
    }

    /**
     * Check if there's enough capacity for a reservation
     */
    private function checkAvailability($businessDayId, $areaId, $requestedPeople)
    {
        $areaXGame = AreaXGame::where('business_day_id', $businessDayId)
            ->where('area_id', $areaId)
            ->first();

        if (!$areaXGame) {
            return ['available' => false, 'message' => 'El área seleccionada no está disponible para esta fecha.'];
        }

        $paidReservations = $this->getPaidReservationsCount($businessDayId, $areaId);
        $availableCapacity = $areaXGame->max_capacity - $paidReservations;

        if ($requestedPeople > $availableCapacity) {
            return [
                'available' => false, 
                'message' => "No hay suficiente capacidad disponible. Espacios disponibles: {$availableCapacity}"
            ];
        }

        return ['available' => true, 'availableCapacity' => $availableCapacity];
    }

    /**
     * Clean up old unpaid reservations (older than 1 hour)
     * This can be called via a scheduled job
     */
    public function cleanupUnpaidReservations()
    {
        $cutoffTime = now()->subHour(); // 1 hour ago
        
        $unpaidReservations = Reservation::whereDoesntHave('payment', function ($query) {
                $query->where('status', 'completed');
            })
            ->where('created_at', '<', $cutoffTime)
            ->where('status', 'pending')
            ->get();

        foreach ($unpaidReservations as $reservation) {
            $reservation->status = 'expired';
            $reservation->save();
        }

        return $unpaidReservations->count();
    }

    /**
     * Get current availability status for a specific area and business day
     * This is useful for AJAX calls to check real-time availability
     */
    public function checkRealTimeAvailability(Request $request)
    {
        $businessDayId = $request->input('business_day_id');
        $areaId = $request->input('area_id');
        $requestedPeople = $request->input('people_count', 1);

        $availability = $this->checkAvailability($businessDayId, $areaId, $requestedPeople);
        
        return response()->json($availability);
    }

    public function store(Request $request)
    {
        $minPeople = config('reservations.min_people_per_reservation', 4);
        
        // First, validate basic fields
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|numeric',
            'fecha' => 'required|exists:business_days,id',
            'area_id' => 'required|exists:areas,id',
            'personas' => "required|integer|min:$minPeople",
        ]);

        // Get the area and check maximum capacity available
        $areaXGame = AreaXGame::where('business_day_id', $request->fecha)
            ->where('area_id', $request->area_id)
            ->first();

        if (!$areaXGame) {
            return back()->withErrors(['error' => 'El área seleccionada no está disponible para esta fecha.'])
                        ->withInput();
        }

        $paidReservations = $this->getPaidReservationsCount($request->fecha, $request->area_id);
        $maxAvailable = $areaXGame->max_capacity - $paidReservations;

        // Validate that personas doesn't exceed available capacity
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|numeric',
            'fecha' => 'required|exists:business_days,id',
            'area_id' => 'required|exists:areas,id',
            'personas' => "required|integer|min:$minPeople|max:$maxAvailable",
        ], [
            'personas.max' => "El número máximo de personas disponibles es $maxAvailable.",
        ]);

        // Use a database transaction to prevent race conditions
        return DB::transaction(function () use ($validated) {
            // Re-check availability within the transaction to prevent race conditions
            $availabilityCheck = $this->checkAvailability(
                $validated['fecha'], 
                $validated['area_id'], 
                $validated['personas']
            );

            if (!$availabilityCheck['available']) {
                return back()->withErrors(['error' => $availabilityCheck['message']])
                            ->withInput();
            }

            // Get the AreaXGame to calculate the total cost
            $areaXGame = AreaXGame::where('business_day_id', $validated['fecha'])
                ->where('area_id', $validated['area_id'])
                ->first();

            // Calculate the total cost based on AreaXGame's cost_per_person
            $totalCost = $areaXGame->cost_per_person * $validated['personas'];

            // Create the reservation and store it in a variable
            $reservation = Reservation::create([
                'name' => $validated['nombre'],
                'email' => $validated['correo'],
                'phone' => $validated['telefono'],
                'business_day_id' => $validated['fecha'],
                'area_id' => $validated['area_id'],
                'area_x_game_id' => $areaXGame ? $areaXGame->id : null, // Store the AreaXGame ID if exists
                'people_count' => $validated['personas'],
                'total_cost' => $totalCost, // Include total cost here
            ]);

            // Don't update reserved_quantity here - only update when payment is completed

            // Send a success email
            //Mail::to($validated['correo'])->send(new ReservationSuccessMail($reservation->load(['businessDay', 'area'])));
            

            return view('checkout', compact('reservation', 'totalCost'));
        });
    }

    public function showDetails($transaction_id)
    {
        $reservation = Reservation::with(['area', 'businessDay'])
            ->where('transaction_id', $transaction_id)
            ->firstOrFail();

        return view('reservation.details', compact('reservation'));
    }

    public function showDetailsWithNotes($transaction_id)
    {
        $reservation = Reservation::with(['area', 'businessDay', 'notes'])
            ->where('transaction_id', $transaction_id)
            ->firstOrFail();

        return view('reservation.details_with_notes', compact('reservation'));
    }


    // public function search()
    // {
    //     return view('reservation.search');
    // }

    public function searchByEmail(Request $request)
    {
        $email = $request->query('email');

        $businessDays = BusinessDay::whereDate('date', '>=', now()->toDateString())
            ->where('is_business_day', true)
            ->orderBy('date')
            ->get();

        $businessDayId = $request->query('businessDayId');

        $reservations = Reservation::when($businessDayId, function ($query, $businessDayId) {
            return $query->where('business_day_id', $businessDayId);
        })
            ->when($email, function ($query, $email) {
                return $query->where('email', $email);
            })
            // Only show future reservations
            ->whereHas('businessDay', function ($query) {
                $query->whereDate('date', '>=', now()->toDateString());
            })
            ->with(['businessDay', 'area'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('reservation.search_by_email', compact('businessDays', 'businessDayId', 'reservations', 'email'));
    }

    //resend email
    public function resendEmail(Request $request, $id)
    {
        $reservation = Reservation::with(['area', 'businessDay'])->findOrFail($id);

        // Send the email again
        Mail::to($reservation->email)->send(new ResendedMail($reservation));

        //recharge the page
        //return redirect()->route('resended.email')->with('success', 'Correo reenviado con éxito.');


        return redirect()->back()->with('success', 'Revisa tu bandeja de entrada.');
    }

    public function resendedEmail()
    {
        return view('resended.email');
    }

    public function createNote(Reservation $reservation)
    {
        return view('reservation.add_note', compact('reservation'));
    }

    public function storeNote(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'note' => 'required|string|max:1000',
        ]);

        ReservationNote::create([
            'reservation_id' => $reservation->id,
            'note' => $validated['note'],
            'created_by' => $request->user()->name,
        ]);

        return redirect()->route('reservation.details.with-notes', $reservation->transaction_id)
            ->with('success', 'Nota agregada exitosamente.');
    }

    public function addExtra(Reservation $reservation)
    {
        // Logic to add extra services or items to the reservation
        return view('reservation.add_extra', compact('reservation'));
    }

    public function storeExtra(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'extra_people' => 'required|integer|min:1',
        ]);

        $extraPeople = $validated['extra_people'];
        
        // Get the area and check availability
        $areaXGame = AreaXGame::where('business_day_id', $reservation->business_day_id)
            ->where('area_id', $reservation->area_id)
            ->first();

        if (!$areaXGame) {
            return back()->with('error', 'El área no está disponible para esta fecha.');
        }

        // Check if there's enough capacity
        $paidReservations = $this->getPaidReservationsCount($reservation->business_day_id, $reservation->area_id);
        $maxAvailable = $areaXGame->max_capacity - $paidReservations;

        if ($extraPeople > $maxAvailable) {
            return back()->with('error', "No hay suficiente capacidad disponible. Solo hay {$maxAvailable} espacios disponibles.");
        }

        // Calculate cost for the new reservation
        $costPerPerson = $reservation->total_cost / $reservation->people_count;
        $newReservationCost = $costPerPerson * $extraPeople;

        // Create a new reservation with the same info
        $newReservation = Reservation::create([
            'name' => $reservation->name,
            'email' => $reservation->email,
            'phone' => $reservation->phone,
            'business_day_id' => $reservation->business_day_id,
            'area_id' => $reservation->area_id,
            'area_x_game_id' => $reservation->area_x_game_id,
            'people_count' => $extraPeople,
            'total_cost' => $newReservationCost,
            'status' => 'pending',
            'transaction_id' => 'RES-' . strtoupper(uniqid()),
        ]);

        // Add note to the original reservation
        ReservationNote::create([
            'reservation_id' => $reservation->id,
            'note' => "Reservación extra creada (#" . $newReservation->id . ") con {$extraPeople} persona(s) adicional(es).",
            'created_by' => $request->user()->name,
        ]);

        // Add note to the new reservation linking to the original
        ReservationNote::create([
            'reservation_id' => $newReservation->id,
            'note' => "Reservación vinculada a la reservación original (#" . $reservation->id . ").",
            'created_by' => $request->user()->name,
        ]);

        // Redirect to checkout for the new reservation
        return redirect()->route('checkout', $newReservation->id)
            ->with('info', "Se creó una nueva reservación para {$extraPeople} persona(s) adicional(es). Por favor complete el pago.");
    }
}
