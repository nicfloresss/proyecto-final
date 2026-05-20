<x-app-layout>

    <div class="py-6 px-6 max-w-4xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Detalle de Cita
        </h1>

        <div class="bg-white shadow rounded p-6 mb-6">

            <p class="mb-2">
                <strong>Cliente:</strong>
                {{ $cita->cliente->name }}
            </p>

            <p class="mb-2">
                <strong>Manicurista:</strong>
                {{ $cita->manicurista->name }}
            </p>

            <p class="mb-2">
                <strong>Servicio:</strong>
                {{ $cita->servicio->nombre }}
            </p>

            <p class="mb-2">
                <strong>Fecha:</strong>
                {{ $cita->fecha }}
            </p>

            <p class="mb-2">
                <strong>Hora:</strong>
                {{ $cita->hora }}
            </p>

        </div>

        <div class="bg-white shadow rounded p-6">

            <h2 class="text-2xl font-bold mb-4">
                Imágenes
            </h2>

            <div class="grid grid-cols-2 gap-4">

                @forelse($cita->imagenes as $imagen)

                    <div>

                        <img src="{{ asset('storage/' . $imagen->ruta) }}"
                             class="rounded shadow w-full">

                        <p class="mt-2 text-sm">
                            {{ $imagen->nombre }}
                        </p>

                    </div>

                @empty

                    <p>
                        No hay imágenes.
                    </p>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>