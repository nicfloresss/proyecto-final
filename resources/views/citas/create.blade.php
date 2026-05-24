<x-app-layout>

    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-2xl mx-auto">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">💅 Nueva Cita</h1>
            <p class="text-sm text-gray-500 mt-1">Completa los datos para agendar una cita</p>
        </div>

        {{-- Errores globales --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-6">
                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">

            <form action="{{ route('citas.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-5">

                @csrf

                {{-- Cliente --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Cliente</label>
                    <select name="cliente_id" required
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition">
                        <option value="">Selecciona cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                        @endforeach
                    </select>
                    @error('cliente_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Manicurista --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Manicurista</label>
                    <select name="manicurista_id" required
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition">
                        <option value="">Selecciona manicurista</option>
                        @foreach($manicuristas as $manicurista)
                            <option value="{{ $manicurista->id }}">{{ $manicurista->name }}</option>
                        @endforeach
                    </select>
                    @error('manicurista_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Servicio --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Servicio</label>
                    <select name="servicio_id" id="servicio_id" required
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition">
                        <option value="">Selecciona servicio</option>
                        @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id }}"
                                    data-nombre="{{ strtolower($servicio->nombre) }}">
                                {{ $servicio->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('servicio_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Fecha y Hora en fila --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Fecha</label>
                        <input type="date" name="fecha" required
                               class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition">
                        @error('fecha')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Hora</label>
                        <input type="time" name="hora" required
                               class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition">
                        @error('hora')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- Imagen (oculta por defecto) --}}
                <div class="hidden" id="imagen-container">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Foto actual de uñas</label>
                    <input type="file" name="imagen" accept="image/*"
                           class="w-full border border-gray-300 rounded-lg p-2.5 text-sm bg-gray-50 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                    @error('imagen')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full sm:w-auto bg-pink-500 hover:bg-pink-600 text-white font-semibold px-6 py-2.5 rounded-lg shadow transition duration-200">
                        💾 Guardar Cita
                    </button>
                </div>

            </form>

        </div>

    </div>

    {{-- Script original intacto --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const servicioSelect = document.getElementById('servicio_id');
            const imagenContainer = document.getElementById('imagen-container');

            servicioSelect.addEventListener('change', function () {
                const selectedOption = servicioSelect.options[servicioSelect.selectedIndex];
                const nombre = selectedOption.dataset.nombre || '';

                if (
                    nombre.includes('uña') ||
                    nombre.includes('gelish') ||
                    nombre.includes('acrilica')
                ) {
                    imagenContainer.classList.remove('hidden');
                } else {
                    imagenContainer.classList.add('hidden');
                }
            });
        });
    </script>

</x-app-layout>