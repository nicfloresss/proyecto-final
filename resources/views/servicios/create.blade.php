<x-app-layout>
@if ($errors->any())

    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
    <div class="py-6 px-6 max-w-2xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Crear Servicio
        </h1>

        <div class="bg-white shadow rounded p-6">

            <form action="{{ route('servicios.store') }}"
                  method="POST">

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

    <p class="text-red-500 text-sm mt-1">
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

    <p class="text-red-500 text-sm mt-1">
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

    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>

@enderror
                </div>

                <button type="submit"
                        class="bg-pink-500 text-white px-4 py-2 rounded">

                    Guardar

                </button>

            </form>

        </div>

    </div>

</x-app-layout>