<?php

namespace App\Http\Controllers;

use App\Models\BusinessDay;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBusinessDayRequest;
use Illuminate\Support\Facades\DB;

class BusinessDayController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');

        $query = BusinessDay::query();

        if ($q) {
            $query->where(function ($sub) use ($q) {
                // Match description
                $sub->where('description', 'like', "%{$q}%");

                // Match formatted date (dd/mm/YYYY) - works on MySQL
                try {
                    $sub->orWhere(DB::raw("DATE_FORMAT(date, '%d/%m/%Y')"), 'like', "%{$q}%");
                } catch (\Exception $e) {
                    // If DATE_FORMAT not supported, fallback to matching raw date string
                    $sub->orWhere('date', 'like', "%{$q}%");
                }

                // Also allow matching raw date column (useful if q is Y-m-d)
                $sub->orWhere('date', 'like', "%{$q}%");
            });
        }

        $businessDays = $query->orderBy('date', 'desc')->paginate(10);

        return view('business-days.index', compact('businessDays'));
    }

    public function create()
    {
        return view('business-days.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'date' => 'required|date',
            'is_business_day' => 'required|boolean',
            'description' => 'nullable|string|max:255',
        ]);

        // Create a new BusinessDay record
        BusinessDay::create([
            'date' => $validated['date'],
            'is_business_day' => $validated['is_business_day'],
            'description' => $validated['description'] ?? null,
        ]);

        // Redirect back with a success message
        return redirect()->route('business-days.index')->with('success', 'Día hábil creado exitosamente.');
    }

    public function show(BusinessDay $businessDay)
    {
        // Eager-load reservations ordered by status, transaction_id, area_id, then newest first
        $businessDay->load(['reservations' => function ($q) {
            $q
                ->orderBy('updated_at', 'asc')
                ->whereNotNull('transaction_id');
        }]);

        // Get areas from AreaXGame with proper relationships for this specific business day
        $areas = \App\Models\AreaXGame::with(['businessDay', 'area'])
            ->where('business_day_id', $businessDay->id)
            ->orderBy('area_id', 'asc')
            ->get();
        
        // Calculate real reserved quantity for each area based on actual reservations
        foreach ($areas as $area) {
            // Use the model's built-in calculation (confirmed only)
            $area->actual_reserved_quantity = $area->actual_reserved_quantity;
            $area->pending_reservations = $area->pending_reservations;
            $area->is_available = $area->actual_available;
            
            // Also store original reserved_quantity for comparison
            $area->original_reserved_quantity = $area->reserved_quantity ?? 0;
        }

        return view('business-days.show', compact('businessDay', 'areas'));
    }

    public function edit(BusinessDay $businessDay)
    {
        return view('business-days.edit', compact('businessDay'));
    }

    public function update(Request $request, BusinessDay $businessDay)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'is_business_day' => 'required|boolean',
            'description' => 'nullable|string|max:500'
        ]);

        try {
            $businessDay->update($validated);
            return redirect()->route('business-days.show', $businessDay)
                ->with('success', 'Día de juego actualizado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function export(BusinessDay $businessDay)
    {
        // Load reservations with related data
        $businessDay->load(['reservations.area', 'reservations.payment']);

        $filename = 'reservaciones_' . $businessDay->date->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function () use ($businessDay) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for UTF-8 Excel compatibility
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // CSV Headers
            fputcsv($file, [
                'ID',
                'Nombre',
                'Email',
                'Teléfono',
                'Área',
                'Personas',
                'Costo Total',
                'Consumo Incluido',
                'Estado',
                'Estado Pago',
                'Transaction ID',
                'Fecha Creación'
            ]);

            // CSV Data rows
            foreach ($businessDay->reservations as $reservation) {
                $baseTicketCost = config('reservations.base_ticket_cost', 0);
                $consumoIncluido = $reservation->total_cost - ($baseTicketCost * $reservation->people_count);
                
                fputcsv($file, [
                    $reservation->id,
                    $reservation->name,
                    $reservation->email,
                    $reservation->phone,
                    $reservation->area->name ?? 'N/A',
                    $reservation->people_count,
                    number_format($reservation->total_cost, 2),
                    number_format($consumoIncluido, 2),
                    $reservation->status ?? 'N/A',
                    $reservation->payment ? $reservation->payment->status : 'Sin pago',
                    $reservation->transaction_id ?? 'N/A',
                    $reservation->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportPdf(BusinessDay $businessDay)
    {
        // Load only confirmed reservations with related data and ordering
        $businessDay->load([
            'reservations' => function ($q) {
                $q->where('status', 'confirmed')
                  ->orderBy('transaction_id', 'desc')
                  ->orderBy('area_id')
                  ->orderBy('created_at', 'desc');
            },
            'reservations.area',
            'reservations.payment',
            'reservations.notes'
        ]);

        $baseTicketCost = config('reservations.base_ticket_cost', 0);

        // Use the filtered reservations collection
        $reservations = $businessDay->reservations;

        // Calculate totals based on confirmed reservations only
        $totalReservations = $reservations->count();
        $totalPeople = $reservations->sum('people_count');
        $totalRevenue = $reservations->sum('total_cost');

        // Return a printable HTML view (user can print to PDF from browser)
        return view('business-days.export-pdf', [
            'businessDay' => $businessDay,
            'reservations' => $reservations,
            'baseTicketCost' => $baseTicketCost,
            'totalReservations' => $totalReservations,
            'totalPeople' => $totalPeople,
            'totalRevenue' => $totalRevenue
        ]);
    }

    // Implementa los demás métodos (show, edit, update, destroy) según necesites
}
