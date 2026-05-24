<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-pink-700">
            ✨ Panel Principal
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-6">

        {{-- HERO BANNER --}}
        <div class="bg-gradient-to-br from-pink-50 via-pink-100 to-pink-200 rounded-2xl p-6 sm:p-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 opacity-10 bg-[radial-gradient(circle,_#ec4899_0%,_transparent_70%)] translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 opacity-10 bg-[radial-gradient(circle,_#db2777_0%,_transparent_70%)] -translate-x-1/4 translate-y-1/4"></div>

            <div class="relative">
                <span class="bg-pink-200 text-pink-700 rounded-full px-3 py-1 text-xs font-semibold mb-3 inline-block">✨ Bienvenida</span>
                <h1 class="text-2xl sm:text-3xl font-bold mb-2 text-pink-900">
                    ¡Hola, {{ Auth::user()->name }}! 💅
                </h1>
                <p class="text-sm sm:text-base mb-5 text-pink-800">
                    Gestiona tu salón desde un solo lugar. Aquí tienes todo lo que necesitas.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('citas.create') }}" class="bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-xl px-5 py-2.5 font-semibold text-sm transition duration-200 hover:opacity-90 hover:-translate-y-0.5 inline-flex items-center gap-2 shadow-sm">
                        📅 Nueva cita
                    </a>
                    <a href="{{ route('servicios.index') }}" class="border-2 border-pink-500 text-pink-600 bg-white rounded-xl px-5 py-2.5 font-semibold text-sm transition duration-200 hover:bg-pink-50 inline-flex items-center gap-2">
                        💼 Ver servicios
                    </a>
                </div>
            </div>
        </div>

        {{-- STATS --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-gradient-to-br from-pink-500 to-pink-700 rounded-2xl p-5 text-white shadow-sm">
                <p class="text-xs font-semibold opacity-80 mb-1">Citas hoy</p>
                <p class="text-3xl font-bold">—</p>
            </div>
            <div class="bg-pink-50 border border-pink-300 rounded-2xl p-5 shadow-sm">
                <p class="text-xs font-semibold mb-1 text-pink-700">Servicios activos</p>
                <p class="text-3xl font-bold text-pink-900">—</p>
            </div>
            <div class="bg-pink-50 border border-pink-300 rounded-2xl p-5 shadow-sm">
                <p class="text-xs font-semibold mb-1 text-pink-700">Clientes</p>
                <p class="text-3xl font-bold text-pink-900">—</p>
            </div>
            <div class="bg-pink-50 border border-pink-300 rounded-2xl p-5 shadow-sm">
                <p class="text-xs font-semibold mb-1 text-pink-700">Este mes</p>
                <p class="text-3xl font-bold text-pink-900">—</p>
            </div>
        </div>

        {{-- ACCESOS RÁPIDOS --}}
        <div>
            <h2 class="text-sm font-bold mb-3 text-pink-800">⚡ Accesos rápidos</h2>
            <div class="grid grid-cols-3 sm:grid-cols-6 gap-3">
                <a href="{{ route('citas.index') }}" class="flex flex-col items-center justify-center gap-2 padding py-6 px-4 bg-white border border-pink-200 rounded-2xl text-pink-800 text-xs font-bold transition duration-200 hover:bg-pink-50 hover:border-pink-500 hover:-translate-y-0.5 shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-pink-100 to-pink-200 rounded-xl flex items-center justify-center text-lg">📅</div>
                    Citas
                </a>
                <a href="{{ route('servicios.index') }}" class="flex flex-col items-center justify-center gap-2 padding py-6 px-4 bg-white border border-pink-200 rounded-2xl text-pink-800 text-xs font-bold transition duration-200 hover:bg-pink-50 hover:border-pink-500 hover:-translate-y-0.5 shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-pink-100 to-pink-200 rounded-xl flex items-center justify-center text-lg">💅</div>
                    Servicios
                </a>
            </div>
        </div>

        {{-- DOS COLUMNAS: próximas citas + tips --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Próximas citas --}}
            <div class="bg-white border border-pink-200 rounded-2xl p-6 transition duration-200 hover:-translate-y-0.5 hover:shadow-md shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-base text-pink-900">📋 Próximas citas</h2>
                    <a href="{{ route('citas.index') }}" class="text-xs font-semibold text-pink-500 hover:text-pink-600">Ver todas →</a>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-pink-50">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold bg-gradient-to-br from-pink-100 to-pink-200 text-pink-700">
                            💆
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-pink-900">Sin citas aún</p>
                            <p class="text-xs text-pink-700">Agrega tu primera cita</p>
                        </div>
                        <span class="bg-pink-200 text-pink-700 rounded-full px-2 py-0.5 text-[10px] font-semibold">hoy</span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('citas.create') }}" class="bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-xl px-5 py-2.5 font-semibold text-sm transition duration-200 hover:opacity-90 hover:-translate-y-0.5 inline-flex items-center gap-2 shadow-sm w-full justify-center">
                        + Agendar cita
                    </a>
                </div>
            </div>

            {{-- Panel de info --}}
            <div class="bg-white border border-pink-200 rounded-2xl p-6 transition duration-200 hover:-translate-y-0.5 hover:shadow-md shadow-sm">
                <h2 class="font-bold text-base mb-4 text-pink-900">✨ Tu salón en números</h2>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 rounded-xl bg-pink-50">
                        <div class="flex items-center gap-2">
                            <span class="text-lg">💅</span>
                            <span class="text-sm font-medium text-pink-900">Servicios registrados</span>
                        </div>
                        <span class="font-bold text-lg text-pink-500">—</span>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-xl bg-pink-50">
                        <div class="flex items-center gap-2">
                            <span class="text-lg">👩</span>
                            <span class="text-sm font-medium text-pink-900">Clientes registradas</span>
                        </div>
                        <span class="font-bold text-lg text-pink-500">—</span>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-xl bg-pink-50">
                        <div class="flex items-center gap-2">
                            <span class="text-lg">📅</span>
                            <span class="text-sm font-medium text-pink-900">Citas este mes</span>
                        </div>
                        <span class="font-bold text-lg text-pink-500">—</span>
                    </div>
                </div>
                <p class="text-xs mt-4 text-center text-pink-700">
                    Conecta tus datos reales desde los controladores 🌸
                </p>
            </div>

        </div>

    </div>
</x-app-layout>