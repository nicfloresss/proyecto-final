<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use App\Models\Servicio;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $hoy = Carbon::today()->toDateString();
        $inicioMes = Carbon::now()->startOfMonth()->toDateString();
        $finMes = Carbon::now()->endOfMonth()->toDateString();

        $citasHoyContador = Cita::where('fecha', $hoy)->count();
        $serviciosActivosContador = Servicio::count();
        $clientesContador = User::where('role', 'cliente')->count();
        $citasMesContador = Cita::whereBetween('fecha', [$inicioMes, $finMes])->count();

        $proximasCitas = Cita::with(['cliente', 'servicio'])
            ->where('fecha', '>=', $hoy)
            ->orderBy('fecha', 'asc')
            ->orderBy('hora', 'asc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'citasHoyContador',
            'serviciosActivosContador',
            'clientesContador',
            'citasMesContador',
            'proximasCitas'
        ));
    }
}