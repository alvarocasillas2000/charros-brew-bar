<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
    {
        $roles = [
            [
                'name' => 'Administrator',
                'slug' => 'admin',
                'description' => 'Has full system access'
            ],
            [
                'name' => 'Manager',
                'slug' => 'manager',
                'description' => 'Can manage the web'
            ],
            [
                'name' => 'User',
                'slug' => 'user',
                'description' => 'Standard user account'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
