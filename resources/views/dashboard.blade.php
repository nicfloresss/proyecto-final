<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-pink-700 flex items-center gap-2">
            <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
            Panel Principal
            <span class="text-xs bg-pink-200 text-pink-800 px-2 py-0.5 rounded-full font-medium capitalize">
                {{ Auth::user()->role }}
            </span>
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-6">

        <div class="bg-gradient-to-br from-pink-50 via-pink-100 to-pink-200 rounded-2xl p-6 sm:p-8 relative overflow-hidden shadow-sm border border-pink-200/50">
            <div class="absolute top-0 right-0 w-64 h-64 opacity-10 bg-[radial-gradient(circle,_#ec4899_0%,_transparent_70%)] translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 opacity-10 bg-[radial-gradient(circle,_#db2777_0%,_transparent_70%)] -translate-x-1/4 translate-y-1/4"></div>

            <div class="relative">
                <span class="bg-pink-200 text-pink-700 rounded-full px-3 py-1 text-xs font-semibold mb-3 inline-flex items-center gap-1.5 shadow-xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-pink-500 animate-pulse"></span>
                </span>
                <h1 class="text-2xl sm:text-3xl font-bold mb-2 text-pink-900">
                    ¡Hola, {{ Auth::user()->name }}! 
                </h1>
                <p class="text-sm sm:text-base mb-5 text-pink-800">
                    @if(Auth::user()->role === 'cliente')
                        Reserva tus citas y revisa tus próximos diseños desde un solo lugar.
                    @else
                        Gestiona tu salón desde un solo lugar. Aquí tienes todo lo que necesitas hoy.
                    @endif
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('citas.create') }}" class="bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-xl px-5 py-2.5 font-semibold text-sm transition duration-200 hover:opacity-90 hover:-translate-y-0.5 inline-flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Nueva cita
                    </a>
                    
                    @if(Auth::user()->role !== 'cliente')
                        <a href="{{ route('servicios.index') }}" class="border border-pink-300 text-pink-700 bg-white/80 backdrop-blur-xs rounded-xl px-5 py-2.5 font-semibold text-sm transition duration-200 hover:bg-pink-50 inline-flex items-center gap-2 shadow-xs">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Ver servicios
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- STATS: Administrador --}}
        @if(Auth::user()->role !== 'cliente')
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl p-5 text-white shadow-sm relative overflow-hidden group">
                    <p class="text-xs font-semibold opacity-80 mb-1">Citas hoy</p>
                    <p class="text-3xl font-bold z-10 relative">{{ $citasHoyContador }}</p>
                    <svg class="w-16 h-16 absolute -right-4 -bottom-4 text-white/10 group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div class="bg-white border border-pink-200 rounded-2xl p-5 shadow-sm relative overflow-hidden group">
                    <p class="text-xs font-semibold mb-1 text-pink-500">Servicios activos</p>
                    <p class="text-3xl font-bold text-pink-900 z-10 relative">{{ $serviciosActivosContador }}</p>
                    <svg class="w-16 h-16 absolute -right-4 -bottom-4 text-pink-100/60 group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                </div>
                <div class="bg-white border border-pink-200 rounded-2xl p-5 shadow-sm relative overflow-hidden group">
                    <p class="text-xs font-semibold mb-1 text-pink-500">Clientes</p>
                    <p class="text-3xl font-bold text-pink-900 z-10 relative">{{ $clientesContador }}</p>
                    <svg class="w-16 h-16 absolute -right-4 -bottom-4 text-pink-100/60 group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div class="bg-white border border-pink-200 rounded-2xl p-5 shadow-sm relative overflow-hidden group">
                    <p class="text-xs font-semibold mb-1 text-pink-500">Este mes</p>
                    <p class="text-3xl font-bold text-pink-900 z-10 relative">{{ $citasMesContador }}</p>
                    <svg class="w-16 h-16 absolute -right-4 -bottom-4 text-pink-100/60 group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2"/></svg>
                </div>
            </div>
        @endif

        {{-- ACCESOS RÁPIDOS --}}
        <div>
            <h2 class="text-xs uppercase tracking-wider font-bold mb-3 text-pink-500">Accesos rápidos</h2>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('citas.index') }}" class="w-32 flex flex-col items-center justify-center gap-2 py-5 px-4 bg-white border border-pink-100 rounded-2xl text-pink-800 text-xs font-bold transition duration-200 hover:bg-pink-50/50 hover:border-pink-400 hover:-translate-y-0.5 shadow-xs">
                    <div class="w-10 h-10 bg-pink-100/80 rounded-xl flex items-center justify-center text-pink-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    Citas
                </a>
                
                @if(Auth::user()->role !== 'cliente')
                    <a href="{{ route('servicios.index') }}" class="w-32 flex flex-col items-center justify-center gap-2 py-5 px-4 bg-white border border-pink-100 rounded-2xl text-pink-800 text-xs font-bold transition duration-200 hover:bg-pink-50/50 hover:border-pink-400 hover:-translate-y-0.5 shadow-xs">
                        <div class="w-10 h-10 bg-pink-100/80 rounded-xl flex items-center justify-center text-pink-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        Servicios
                    </a>
                @endif
            </div>
        </div>

        {{-- DOS COLUMNAS --}}
        <div class="grid grid-cols-1 {{ Auth::user()->role !== 'cliente' ? 'lg:grid-cols-2' : '' }} gap-6">

            {{-- Próximas citas --}}
            <div class="bg-white border border-pink-100 rounded-2xl p-6 transition duration-200 hover:shadow-xs shadow-xs flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-bold text-base text-pink-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                            Próximas citas
                        </h2>
                        <a href="{{ route('citas.index') }}" class="text-xs font-semibold text-pink-500 hover:text-pink-600 transition">Ver todas →</a>
                    </div>
                    
                    <div class="space-y-3">
                        @forelse($proximasCitas as $cita)
                            <div class="flex items-center gap-3 p-3 rounded-xl bg-pink-50/50 border border-pink-100/50 hover:bg-pink-50 transition">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center bg-gradient-to-br from-pink-100 to-pink-200 text-pink-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7h7m-7-3h7m-7-3h7M4 19h4a1 1 0 001-1V6a1 1 0 00-1-1H4a1 1 0 00-1 1v12a1 1 0 001 1z"/></svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-pink-900">
                                        {{ Auth::user()->role === 'cliente' ? 'Mi Cita de Uñas' : ($cita->cliente->name ?? 'Cliente') }}
                                    </p>
                                    <p class="text-xs text-pink-700 font-medium">{{ $cita->servicio->nombre ?? 'Servicio' }} — {{ \Carbon\Carbon::parse($cita->hora)->format('g:i A') }}</p>
                                </div>
                                <span class="bg-white border border-pink-200 text-pink-700 rounded-lg px-2.5 py-1 text-[11px] font-bold shadow-2xs">
                                    {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m') }}
                                </span>
                            </div>
                        @empty
                            <div class="flex items-center gap-3 p-4 rounded-xl bg-pink-50/40 border border-dashed border-pink-200 text-center flex-col justify-center py-8">
                                <svg class="w-8 h-8 text-pink-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                <div class="text-center">
                                    <p class="text-sm font-semibold text-pink-900">Sin citas agendadas aún</p>
                                    <p class="text-xs text-pink-500">Cuando agendes una cita, aparecerá aquí.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="mt-5">
                    <a href="{{ route('citas.create') }}" class="bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-xl px-5 py-2.5 font-semibold text-sm transition duration-200 hover:opacity-90 hover:-translate-y-0.5 inline-flex items-center gap-2 shadow-sm w-full justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Agendar cita nueva
                    </a>
                </div>
            </div>

            {{-- Panel de info --}}
            @if(Auth::user()->role !== 'cliente')
                <div class="bg-white border border-pink-100 rounded-2xl p-6 transition duration-200 hover:shadow-xs shadow-xs">
                    <h2 class="font-bold text-base mb-4 text-pink-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 022 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2"/></svg>
                        Tu salón en números
                    </h2>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 rounded-xl bg-pink-50/50 border border-pink-100/50">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-pink-500 shadow-2xs border border-pink-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                </div>
                                <span class="text-sm font-semibold text-pink-900">Servicios registrados</span>
                            </div>
                            <span class="font-bold text-lg text-pink-600 bg-white border border-pink-100 px-3 py-0.5 rounded-lg shadow-2xs">{{ $serviciosActivosContador }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-xl bg-pink-50/50 border border-pink-100/50">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-pink-500 shadow-2xs border border-pink-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                </div>
                                <span class="text-sm font-semibold text-pink-900">Clientes registradas</span>
                            </div>
                            <span class="font-bold text-lg text-pink-600 bg-white border border-pink-100 px-3 py-0.5 rounded-lg shadow-2xs">{{ $clientesContador }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-xl bg-pink-50/50 border border-pink-100/50">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-pink-500 shadow-2xs border border-pink-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <span class="text-sm font-semibold text-pink-900">Citas este mes</span>
                            </div>
                            <span class="font-bold text-lg text-pink-600 bg-white border border-pink-100 px-3 py-0.5 rounded-lg shadow-2xs">{{ $citasMesContador }}</span>
                        </div>
                    </div>
                    <div class="mt-4 p-3 bg-pink-50/30 border border-pink-100 rounded-xl text-center">
                        <p class="text-[11px] font-medium text-pink-600">
                            💡 Tip: Revisa el catálogo de servicios frecuentemente para mantener los precios base actualizados.
                        </p>
                    </div>
                </div>
            @endif

        </div>

    </div>
</x-app-layout>