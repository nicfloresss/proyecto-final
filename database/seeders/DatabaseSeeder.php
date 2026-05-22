<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cita;
use App\Models\Servicio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'role' => 'admin'
        ]);

        User::factory(3)->create([
            'role' => 'cliente'
        ]);

        User::factory(2)->create([
            'role' => 'manicurista'
        ]);

        Servicio::factory(5)->create();

        Cita::factory(10)->create();
    }
}