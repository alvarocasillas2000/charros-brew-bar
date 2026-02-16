<?php

namespace App\Observers;

use App\Models\BusinessDay;
use App\Models\Area;
use App\Models\AreaXGame;


class BusinessDayObserver
{
    /**
     * Handle the BusinessDay "created" event.
     */
    public function created(BusinessDay $businessDay)
    {
        // Obtener todas las áreas (asumiendo que son 4 como mencionaste)
        $areas = Area::all();
        
        foreach ($areas as $area) {
            AreaXGame::create([
                'business_day_id' => $businessDay->id,
                'area_id' => $area->id,
                'cost_per_person' => $area->cost_per_person,
                'max_capacity' => $area->capacity,
                'reserved_quantity' => 0
            ]);
        }
    }

    /**
     * Handle the BusinessDay "updated" event.
     */
    public function updated(BusinessDay $businessDay): void
    {
        //
    }

    /**
     * Handle the BusinessDay "deleted" event.
     */
    public function deleted(BusinessDay $businessDay): void
    {
        //
    }

    /**
     * Handle the BusinessDay "restored" event.
     */
    public function restored(BusinessDay $businessDay): void
    {
        //
    }

    /**
     * Handle the BusinessDay "force deleted" event.
     */
    public function forceDeleted(BusinessDay $businessDay): void
    {
        //
    }
}
