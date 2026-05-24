<x-app-layout>

    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800"> Detalle de Cita</h1>
            <p class="text-sm text-gray-500 mt-1">Información completa de la cita</p>
        </div>

        <div class="bg-white shadow-md rounded-xl p-6 sm:p-8 space-y-4">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div class="bg-pink-50 rounded-lg p-4">
                    <p class="text-xs font-semibold text-pink-400 uppercase tracking-wider mb-1">Cliente</p>
                    <p class="text-gray-800 font-medium">{{ $cita->cliente->name }}</p>
                </div>

                <div class="bg-pink-50 rounded-lg p-4">
                    <p class="text-xs font-semibold text-pink-400 uppercase tracking-wider mb-1">Manicurista</p>
                    <p class="text-gray-800 font-medium">{{ $cita->manicurista->name }}</p>
                </div>

                <div class="bg-pink-50 rounded-lg p-4">
                    <p class="text-xs font-semibold text-pink-400 uppercase tracking-wider mb-1">Servicio</p>
                    <p class="text-gray-800 font-medium">{{ $cita->servicio->nombre }}</p>
                </div>

                <div class="bg-pink-50 rounded-lg p-4">
                    <p class="text-xs font-semibold text-pink-400 uppercase tracking-wider mb-1">Fecha</p>
                    <p class="text-gray-800 font-medium">{{ $cita->fecha }}</p>
                </div>

                <div class="bg-pink-50 rounded-lg p-4">
                    <p class="text-xs font-semibold text-pink-400 uppercase tracking-wider mb-1">Hora</p>
                    <p class="text-gray-800 font-medium">{{ $cita->hora }}</p>
                </div>

            </div>

            @if($cita->imagenes->count())
                <div class="mt-6">
                    <h2 class="text-lg font-bold text-gray-700 mb-4"> Fotos</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($cita->imagenes as $imagen)
                            <div>
                                <img src="{{ asset('storage/' . $imagen->ruta) }}"
                                     class="rounded-xl shadow w-full object-cover aspect-square">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="pt-4">
                <a href="{{ route('citas.index') }}"
                   class="inline-flex items-center gap-2 text-sm text-pink-600 hover:text-pink-800 font-medium transition">
                    ← Volver a citas
                </a>
            </div>

        </div>

    </div>

</x-app-layout>