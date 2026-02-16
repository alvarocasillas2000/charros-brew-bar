<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessDay;
use Carbon\Carbon;

class BusinessDaySeeder extends Seeder
{
    public function run()
    {
        // Desactivar revisión de claves foráneas temporalmente
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        BusinessDay::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $businessDays = [
            [
                'date' => Carbon::create(2025, 7, 22),
                'is_business_day' => true,
                'description' => 'Juego 1: Algodoneros de Unión Laguna | 7:30pm'
            ],
            [
                'date' => Carbon::create(2025, 7, 23),
                'is_business_day' => true,
                'description' => 'Juego 2: Algodoneros de Unión Laguna | 7:30pm'
            ],
            [
                'date' => Carbon::create(2025, 7, 24),
                'is_business_day' => true,
                'description' => 'Juego 3: Algodoneros de Unión Laguna | 7:30pm'
            ],
            [
                'date' => Carbon::create(2025, 7, 25),
                'is_business_day' => true,
                'description' => 'Juego 1: Rieleros de Aguascalientes | 7:30pm'
            ],
            [
                'date' => Carbon::create(2025, 7, 26),
                'is_business_day' => true,
                'description' => 'Juego 2: Rieleros de Aguascalientes | 7:30pm'
            ]
        ];

        foreach ($businessDays as $day) {
            BusinessDay::create($day);
        }

        $this->command->info('¡Días de negocio creados exitosamente!');

        // Llamar al AreaXGamesSeeder
        $this->call(AreaXGamesSeeder::class);
    }
}