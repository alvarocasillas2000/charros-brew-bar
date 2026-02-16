<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaXGame;
use App\Models\Reservation;
use App\Models\BusinessDay;

class AreaXGamesController extends Controller
{
    public function index(Request $request)
    {
        $businessDayId = $request->query('business_day_id');
        
        // Get all future business days for the filter
        $businessDays = BusinessDay::whereDate('date', '>=', now()->toDateString())
            ->orderBy('date', 'asc')
            ->get();
        
        $query = AreaXGame::with(['businessDay', 'area'])
            ->whereHas('businessDay', function ($query) {
                $query->whereDate('date', '>=', now()->toDateString());
            });
        
        // Apply filter if a business day is selected
        if ($businessDayId) {
            $query->where('business_day_id', $businessDayId);
        }
        
        $areas = $query->orderBy('id', 'asc')->paginate(12);
        
        return view('areas.index', compact('areas', 'businessDays', 'businessDayId'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string|max:500',
        ]);

        AreaXGame::create($validated);

        return redirect()->route('areas.index')->with('success', 'Área creada exitosamente.');
    }

    public function show(AreaXGame $area, Request $request)
    {
        $businessDayId = $request->query('business_day_id');

        $reservations = Reservation::where('area_x_game_id', $area->id)
            ->when($businessDayId, function ($query, $businessDayId) {
                return $query->where('business_day_id', $businessDayId);
            })
            ->get();

        return view('areas.show', compact('area', 'reservations'));
    }

    public function edit(AreaXGame $area)
    {
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, AreaXGame $area)
    {
        $validated = $request->validate([
            'max_capacity' => 'required|integer|min:1',
            'cost_per_person' => 'required|numeric|min:0',
        ]);

        $area->update($validated);

        return redirect()->route('areas.index')->with('success', 'Área actualizada exitosamente.');
    }

    public function destroy(AreaXGame $area)
    {
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Área eliminada exitosamente.');
    }
}
