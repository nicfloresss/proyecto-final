<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioFactory extends Factory
{
    public function definition(): array
    {
        // 1. Creas una lista de servicios reales de tu negocio
        $serviciosBelleza = [
            'Manicura Rusa', 
            'Uñas Acrílicas', 
            'Gelish en Manos', 
            'Pedicura Spa', 
            'Diseño de Nail Art', 
            'Retirado de Gel',
            'Esculturales San Valentín',
            'Pestañas Pelo a Pelo',
            'Lifting de Pestañas',
            'Depilación con Cera',
            'Pestañas Volumen',
            'Pestañas Mega Volumen',
            'Pestañas Híbridas',
        ];

        return [
            // 2. Le dices a Faker que elija uno al azar de tu lista
            'nombre' => $this->faker->randomElement($serviciosBelleza),
            'descripcion' => 'Servicio profesional con productos de alta calidad y una duración garantizada.',
            'precio_base' => $this->faker->randomElement([250, 300, 450, 600, 150]),
        ];
    }
}