<x-app-layout>

    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 gap-4">
             <div>
                <h1 class="text-3xl font-bold text-gray-800"> Citas</h1>
                <p class="text-sm text-gray-500 mt-1">Gestiona todas las citas del salón</p>
            </div>

             <a href="{{ route('citas.create') }}"
               class="inline-flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white font-semibold px-5 py-2.5 rounded-lg shadow transition duration-200">
                + Nueva Cita
            </a>

        </div>

        <div class="bg-white shadow-md rounded-xl overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-gray-700">

                    <thead class="bg-pink-50 text-pink-700 uppercase text-xs tracking-wider">
                    <tr>
                         <th class="px-6 py-4 text-left">Cliente</th>
                            <th class="px-6 py-4 text-left">Manicurista</th>
                            <th class="px-6 py-4 text-left">Servicio</th>
                            <th class="px-6 py-4 text-left">Fecha</th>
                            <th class="px-6 py-4 text-left">Hora</th>
                            <th class="px-6 py-4 text-left">Acciones</th>
                    </tr>
                </thead>

                 <tbody class="divide-y divide-gray-100">

                    @foreach($citas as $cita)

                        <tr class="hover:bg-pink-50 transition duration-150">


                            <td class="px-6 py-4 font-medium">{{ $cita->cliente->name }}</td>
                                <td class="px-6 py-4">{{ $cita->manicurista->name }}</td>
                                <td class="px-6 py-4">
                                    <span class="bg-pink-100 text-pink-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                        {{ $cita->servicio->nombre }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $cita->fecha }}</td>
                                <td class="px-6 py-4">{{ $cita->hora }}</td>
                             <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">

                                <a href="{{ route('citas.show', $cita) }}"
                                           class="text-emerald-600 hover:text-emerald-800 font-medium transition">Ver</a>

                                        <a href="{{ route('citas.edit', $cita) }}"
                                           class="text-blue-500 hover:text-blue-700 font-medium transition">Editar</a>

                                        <form action="{{ route('citas.destroy', $cita) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                             @method('DELETE')

                                     <button class="text-red-500 hover:text-red-700 font-medium transition">
                                                Eliminar
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>