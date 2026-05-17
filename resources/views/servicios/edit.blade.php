<x-app-layout>

    <div class="py-6 px-6 max-w-2xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Editar Servicio
        </h1>

        <form action="{{ route('servicios.update', $servicio) }}"
              method="POST"
              class="bg-white p-6 rounded shadow">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2">
                    Nombre
                </label>

                <input type="text"
                       name="nombre"
                       value="{{ $servicio->nombre }}"
                       required
                       class="w-full border rounded p-2">

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Descripción
                </label>

                <textarea name="descripcion"
                          required
                          class="w-full border rounded p-2">{{ $servicio->descripcion }}</textarea>

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Precio
                </label>

                <input type="number"
                       step="0.01"
                       name="precio_base"
                       value="{{ $servicio->precio_base }}"
                       required
                       class="w-full border rounded p-2">

            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">

                Actualizar

            </button>

        </form>

    </div>

</x-app-layout>