<x-app-layout>

    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-2xl mx-auto">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">✏️ Editar Cita</h1>
            <p class="text-sm text-gray-500 mt-1">Modifica los datos de la cita</p>
        </div>

        <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">

            <form action="{{ route('citas.update', $cita) }}"
                  method="POST"
                  class="space-y-5">

                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Cliente</label>
                    <select name="cliente_id" required
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}"
                                {{ $cita->cliente_id == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Manicurista</label>
                    <select name="manicurista_id" required
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
                        @foreach($manicuristas as $manicurista)
                            <option value="{{ $manicurista->id }}"
                                {{ $cita->manicurista_id == $manicurista->id ? 'selected' : '' }}>
                                {{ $manicurista->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Servicio</label>
                    <select name="servicio_id" required
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
                        @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id }}"
                                {{ $cita->servicio_id == $servicio->id ? 'selected' : '' }}>
                                {{ $servicio->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Fecha</label>
                        <input type="date" name="fecha" value="{{ $cita->fecha }}" required
                               class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Hora</label>
                        <input type="time" name="hora" value="{{ $cita->hora }}" required
                               class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
                    </div>

                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2.5 rounded-lg shadow transition duration-200">
                        💾 Actualizar Cita
                    </button>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>