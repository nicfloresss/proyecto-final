<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-6">
            Servicios
        </h1>

        <a href="{{ route('servicios.create') }}"
           class="bg-pink-500 text-white px-4 py-2 rounded">

            Nuevo Servicio

        </a>

        <div class="mt-6 bg-white shadow rounded p-4">

            <table class="w-full">

                <thead>
                    <tr>
                        <th class="text-left">Nombre</th>
                        <th class="text-left">Precio</th>
                        <th class="text-left">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($servicios as $servicio)

                        <tr class="border-t">

                            <td class="py-3">
                                {{ $servicio->nombre }}
                            </td>

                            <td>
                                ${{ $servicio->precio_base }}
                            </td>

                            <td class="space-x-2">

                                <a href="{{ route('servicios.edit', $servicio) }}"
                                   class="text-blue-500">

                                    Editar

                                </a>

                                <form action="{{ route('servicios.destroy', $servicio) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-500">

                                        Eliminar

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>