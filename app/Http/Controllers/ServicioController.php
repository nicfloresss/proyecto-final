<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $servicios = Servicio::all();

    return view('servicios.index', compact('servicios'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    return view('servicios.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:255',
        'descripcion' => 'required',
        'precio_base' => 'required|numeric|min:1'
    ]);

    Servicio::create($request->all());

    return redirect()->route('servicios.index')
                     ->with('success', 'Servicio creado correctamente');
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
    public function edit(Servicio $servicio)
{
    return view('servicios.edit', compact('servicio'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Servicio $servicio)
{
    $request->validate([
        'nombre' => 'required|max:255',
        'descripcion' => 'required',
        'precio_base' => 'required|numeric|min:1'
    ]);

    $servicio->update($request->all());

    return redirect()->route('servicios.index')
                     ->with('success', 'Servicio actualizado');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
{
    $servicio->delete();

    return redirect()->route('servicios.index')
                     ->with('success', 'Servicio eliminado');
}
}
