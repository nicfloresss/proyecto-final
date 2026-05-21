<x-app-layout>

    <div class="py-6 px-6 max-w-4xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Detalle de Cita
        </h1>

        <div class="bg-white shadow rounded p-6">

            <div class="mb-4">

                <h2 class="font-bold">
                    Cliente
                </h2>

                <p>
                    {{ $cita->cliente->name }}
                </p>

            </div>

            <div class="mb-4">

                <h2 class="font-bold">
                    Manicurista
                </h2>

                <p>
                    {{ $cita->manicurista->name }}
                </p>

            </div>

            <div class="mb-4">

                <h2 class="font-bold">
                    Servicio
                </h2>

                <p>
                    {{ $cita->servicio->nombre }}
                </p>

            </div>

            <div class="mb-4">

                <h2 class="font-bold">
                    Fecha
                </h2>

                <p>
                    {{ $cita->fecha }}
                </p>

            </div>

            <div class="mb-4">

                <h2 class="font-bold">
                    Hora
                </h2>

                <p>
                    {{ $cita->hora }}
                </p>

            </div>

            @if($cita->imagenes->count())

                <div class="mt-6">

                    <h2 class="font-bold text-xl mb-4">
                        Fotos
                    </h2>

                    <div class="grid grid-cols-2 gap-4">

                        @foreach($cita->imagenes as $imagen)

                            <div>

                                <img src="{{ asset('storage/' . $imagen->ruta) }}"
                                     class="rounded shadow w-full">

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>