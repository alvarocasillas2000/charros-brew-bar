<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the users table
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@charros.com',
            'password' => bcrypt('admin123'), // Encrypted password
            'role' => 'admin', // Admin role
        ]);
        User::factory()->create([
            'name' => 'Alvaro Casillas',
            'email' => 'alvaro.casillas@charrosjalisco.com',
            'password' => bcrypt('Alvaro123.'), // Encrypted password
            'role' => 'admin', // Regular user role
        ]);
        User::factory()->create([
            'name' => 'Pascual Aranda',
            'email' => 'pascual.aranda@charrosjalisco.com',
            'password' => bcrypt('Pascual123.'), // Encrypted password
            'role' => 'user', // Regular user role
        ]);
        User::factory()->create([
            'name' => 'Yolesvy Vidal',
            'email' => 'yolesvy.vidal@charrosjalisco.com',
            'password' => bcrypt('Yolesvy123.'), // Encrypted password
            'role' => 'user', // Regular user role
        ]);
        User::factory()->create([
            'name' => 'Cesar Carrasco',
            'email' => 'cesar.carrasco@charrosjalisco.com',
            'password' => bcrypt('Cesar123.'), // Encrypted password
            'role' => 'user', // Regular user role
        ]);
        User::factory()->create([
            'name' => 'Selby Esteves',
            'email' => 'selby.esteves@charrosjalisco.com',
            'password' => bcrypt('Selby123.'), // Encrypted password
            'role' => 'user', // Regular user role
        ]);

        // Call the BusinessDaySeeder
        $this->call([
            BusinessDaySeeder::class,
            AreaSeeder::class,
            AreaXGamesSeeder::class,
        ]);
    }
}
