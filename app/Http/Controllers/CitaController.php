<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use App\Models\Servicio;
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
        'hora' => 'required'
    ]);

    Cita::create($request->all());

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
