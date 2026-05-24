<x-app-layout>

    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-2xl mx-auto">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">✏️ Editar Servicio</h1>
            <p class="text-sm text-gray-500 mt-1">Modifica los datos del servicio</p>
        </div>

        <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">

            <form action="{{ route('servicios.update', $servicio) }}"
                  method="POST"
                  class="space-y-5">

                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre</label>
                    <input type="text" name="nombre" value="{{ $servicio->nombre }}" required
                           class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Descripción</label>
                    <textarea name="descripcion" required rows="3"
                              class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition resize-none">{{ $servicio->descripcion }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Precio base</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2.5 text-gray-400 text-sm">$</span>
                        <input type="number" step="0.01" name="precio_base" value="{{ $servicio->precio_base }}" required
                               class="w-full border border-gray-300 rounded-lg pl-7 p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2.5 rounded-lg shadow transition duration-200">
                        💾 Actualizar Servicio
                    </button>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>