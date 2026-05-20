<x-app-layout>

    <div class="py-6 px-6 max-w-2xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Nuevo Servicio
        </h1>

       <form action="{{ route('citas.store') }}"
      method="POST"
      enctype="multipart/form-data">

            @csrf

            <div class="mb-4">

                <label class="block mb-2">
                    Nombre
                </label>

                <input type="text"
                       name="nombre"
                       required
                       class="w-full border rounded p-2">

                @error('nombre')
                    <p class="text-red-500 text-sm">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Descripción
                </label>

                <textarea name="descripcion"
                          required
                          class="w-full border rounded p-2"></textarea>

                @error('descripcion')
                    <p class="text-red-500 text-sm">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Precio
                </label>

                <input type="number"
                       step="0.01"
                       name="precio_base"
                       required
                       class="w-full border rounded p-2">

                @error('precio_base')
                    <p class="text-red-500 text-sm">
                        {{ $message }}
                    </p>
                @enderror

            </div>
<div class="mb-4">

    <label class="block mb-2">
        Foto actual de uñas
    </label>

    <input type="file"
           name="imagen"
           accept="image/*"
           class="w-full border rounded p-2">

</div>
            <button class="bg-pink-500 text-white px-4 py-2 rounded">

                Guardar Servicio

            </button>

        </form>

    </div>

</x-app-layout>