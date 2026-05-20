<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Imagen;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $citas = Cita::with([
        'cliente',
        'manicurista',
        'servicio'
    ])->get();

    return view('citas.index', compact('citas'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $clientes = User::where('role', 'cliente')->get();

    $manicuristas = User::where('role', 'manicurista')->get();

    $servicios = Servicio::all();

    return view('citas.create', compact(
        'clientes',
        'manicuristas',
        'servicios'
    ));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'cliente_id' => 'required',
        'manicurista_id' => 'required',
        'servicio_id' => 'required',
        'fecha' => 'required|date',
        'hora' => 'required',
        'imagen' => 'nullable|image|max:2048'
    ]);

    $cita = Cita::create([
        'cliente_id' => $request->cliente_id,
        'manicurista_id' => $request->manicurista_id,
        'servicio_id' => $request->servicio_id,
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'estado' => 'pendiente'
    ]);

    if ($request->hasFile('imagen')) {

        $archivo = $request->file('imagen');

        $ruta = $archivo->store('imagenes', 'public');

        Imagen::create([
            'user_id' => $request->user()->id,
            'cita_id' => $cita->id,
            'nombre' => $archivo->getClientOriginalName(),
            'ruta' => $ruta
        ]);
    }

    return redirect()->route('citas.index')
                     ->with('success', 'Cita creada correctamente');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
{
    $clientes = User::where('role', 'cliente')->get();

    $manicuristas = User::where('role', 'manicurista')->get();

    $servicios = Servicio::all();

    return view('citas.edit', compact(
        'cita',
        'clientes',
        'manicuristas',
        'servicios'
    ));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
{
    $request->validate([
        'cliente_id' => 'required',
        'manicurista_id' => 'required',
        'servicio_id' => 'required',
        'fecha' => 'required|date',
        'hora' => 'required'
    ]);

    $cita->update($request->all());

    return redirect()->route('citas.index')
                     ->with('success', 'Cita actualizada');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
{
    $cita->delete();

    return redirect()->route('citas.index')
                     ->with('success', 'Cita eliminada');
}
}
