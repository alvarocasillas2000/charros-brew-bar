<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessDay;
use App\Models\Area;
use App\Models\AreaXGame;

class AreaXGamesSeeder extends Seeder
{
    public function run()
    {
        // Obtener todos los días de negocio
        $businessDays = BusinessDay::all();

        // Obtener todas las áreas
        $areas = Area::all();

        foreach ($businessDays as $businessDay) {
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

        $this->command->info('¡Registros de AreaXGame creados exitosamente!');
    }
}
