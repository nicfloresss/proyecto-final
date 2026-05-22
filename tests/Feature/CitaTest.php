<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Servicio;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CitaTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_loads()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_usuario_puede_crear_cita()
    {
        /** @var User $cliente */
        $cliente = User::factory()->createOne([
            'role' => 'cliente'
        ]);

        /** @var User $manicurista */
        $manicurista = User::factory()->createOne([
            'role' => 'manicurista'
        ]);

        $servicio = Servicio::factory()->create();

        $response = $this->actingAs($cliente)
            ->post('/citas', [
                'cliente_id' => $cliente->id,
                'manicurista_id' => $manicurista->id,
                'servicio_id' => $servicio->id,
                'fecha' => '2026-05-25',
                'hora' => '10:00'
            ]);

        $response->assertRedirect('/citas');

        $this->assertDatabaseHas('citas', [
            'cliente_id' => $cliente->id,
            'manicurista_id' => $manicurista->id,
            'servicio_id' => $servicio->id,
            'fecha' => '2026-05-25',
            'hora' => '10:00'
        ]);
    }
}