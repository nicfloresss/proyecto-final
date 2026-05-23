<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Servicio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

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
        Mail::fake();

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

    public function test_validacion_falla_si_faltan_datos()
{
    /** @var \App\Models\User $cliente */
    $cliente = User::factory()->createOne([
        'role' => 'cliente'
    ]);

    $response = $this->actingAs($cliente)
        ->post('/citas', []);

    $response->assertSessionHasErrors([
        'cliente_id',
        'manicurista_id',
        'servicio_id',
        'fecha',
        'hora'
    ]);
}

public function test_usuario_puede_eliminar_cita()
{
    Mail::fake();

    /** @var \App\Models\User $cliente */
    $cliente = User::factory()->createOne([
        'role' => 'cliente'
    ]);

    /** @var \App\Models\User $manicurista */
    $manicurista = User::factory()->createOne([
        'role' => 'manicurista'
    ]);

    $servicio = Servicio::factory()->create();

    $cita = \App\Models\Cita::create([
        'cliente_id' => $cliente->id,
        'manicurista_id' => $manicurista->id,
        'servicio_id' => $servicio->id,
        'fecha' => '2026-05-25',
        'hora' => '10:00',
        'estado' => 'pendiente'
    ]);

   $response = $this->actingAs($cliente)
    ->delete('/citas/' . $cita->id);

$response->assertRedirect('/citas');

$this->assertSoftDeleted('citas', [
    'id' => $cita->id
]);
}
}