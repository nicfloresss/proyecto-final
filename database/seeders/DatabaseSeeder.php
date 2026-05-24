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
        // 1. Crear el Administrador
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'role' => 'admin'
        ]);

        // 2. Crear los clientes y guardarlos en una variable
        $clientes = User::factory(4)->create([
            'role' => 'cliente'
        ]);

        // También agregamos al Test User a la lista de clientes disponibles
        $testUser = User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'role' => 'cliente'
        ]);
        $clientes->push($testUser);

        // 3. Crear las manicuristas y guardarlas en una variable
        $manicuristas = User::factory(2)->create([
            'role' => 'manicurista'
        ]);

        // 4. Crear los 10 servicios reales de uñas y guardarlos en una variable
        $servicios = Servicio::factory(10)->create();

        // 5. Crear las 10 citas amarrando manualmente los IDs existentes de forma aleatoria
        for ($i = 0; $i < 10; $i++) {
            Cita::create([
                'cliente_id' => $clientes->random()->id,
                'manicurista_id' => $manicuristas->random()->id,
                'servicio_id' => $servicios->random()->id,
                'fecha' => now()->addDays(rand(1, 30))->format('Y-m-d'), // Fechas para los próximos 30 días
                'hora' => rand(9, 18) . ':00', // Horas hábiles entre 9 AM y 6 PM
                'estado' => 'pendiente'
            ]);
        }
    }
}