<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\BusinessDay;
use App\Models\AreaXGame;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Only future business days
        $businessDays = BusinessDay::whereDate('date', '>=', today())
            ->orderBy('date', 'asc')
            ->get();
        $businessDayId = $request->query('businessDayId');
        $email = $request->query('email');
        $reservations = Reservation::where('status', 'confirmed')
            ->when($businessDayId, function ($query, $businessDayId) {
                return $query->where('business_day_id', $businessDayId);
            })->when($email, function ($query, $email) {
                return $query->where('email', 'like', "%$email%");
            })
            ->whereHas('businessDay', function ($query) {
                $query->whereDate('date', '>=', now()->toDateString()); // Only future business days
            })
            ->orderBy('business_day_id')
            ->orderBy('id')
            ->get();
        // Get areas from AreaXGame with proper relationships
        $areas = AreaXGame::with(['businessDay', 'area'])
            ->whereHas('businessDay', function ($query) {
                $query->whereDate('date', '>=', now()->toDateString());
            })
            ->orderBy('business_day_id', 'asc')
            ->orderBy('area_id', 'asc')
            ->get();
        
        // Filter areas by selected business day if provided
        if ($businessDayId) {
            $areas = $areas->where('business_day_id', $businessDayId)->values();
        }
        
        // Calculate real reserved quantity for each area based on actual reservations
        foreach ($areas as $area) {
            // Use the model's built-in calculation (confirmed only)
            $area->actual_reserved_quantity = $area->actual_reserved_quantity;
            $area->pending_reservations = $area->pending_reservations;
            $area->is_available = $area->actual_available;
            
            // Also store original reserved_quantity for comparison
            $area->original_reserved_quantity = $area->reserved_quantity ?? 0;
        }
        
        // Calculate stats for dashboard cards
        $stats = [
            'reservations_today' => Reservation::whereDate('created_at', today())->where('status', 'confirmed')->count(),
            'future_reservations' => Reservation::where('status', 'confirmed')->whereHas('businessDay', function ($query) {
                $query->whereDate('date', '>=', today());
            })->count(),
            'business_days' => $businessDays->count(),
        ];
        return view('dashboard', compact('reservations', 'businessDays', 'businessDayId', 'email', 'areas', 'stats'));
    }
}
