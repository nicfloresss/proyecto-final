<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cliente_id' => User::factory(),
            'manicurista_id' => User::factory(),
            'servicio_id' => Servicio::factory(),
            'fecha' => fake()->date(),
            'hora' => fake()->time(),
            'estado' => 'pendiente'
        ];
    }
}