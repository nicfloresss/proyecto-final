<x-app-layout>

    <div class="py-6 px-6">

        <div class="flex justify-between mb-6">

            <h1 class="text-3xl font-bold">
                Citas
            </h1>

            <a href="{{ route('citas.create') }}"
               class="bg-pink-500 text-white px-4 py-2 rounded">

                Nueva Cita

            </a>

        </div>

        <div class="bg-white shadow rounded p-4">

            <table class="w-full">

                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Manicurista</th>
                        <th>Servicio</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($citas as $cita)

                        <tr class="border-t">

                            <td class="py-3">
                                {{ $cita->cliente->name }}
                            </td>

                            <td>
                                {{ $cita->manicurista->name }}
                            </td>

                            <td>
                                {{ $cita->servicio->nombre }}
                            </td>

                            <td>
                                {{ $cita->fecha }}
                            </td>

                            <td>
                                {{ $cita->hora }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>