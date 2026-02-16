<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run()
    {
        // Desactivar revisión de claves foráneas temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Area::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $areas = [
            [
                'name' => 'Área VIP',
                'description' => 'Área más cercana al campo con una excelente vista',
                'capacity' => 90,
                'cost_per_person' => 500.00
            ],
            [
                'name' => 'Área General',
                'description' => 'Área con vista a las pantallas y al juego',
                'capacity' => 20,
                'cost_per_person' => 250.00
            ]
        ];

        foreach ($areas as $area) {
            Area::create($area);
        }

        $this->command->info('¡Áreas creadas exitosamente!');
    }
}