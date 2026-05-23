<x-app-layout>

    <div class="py-6 px-6 max-w-2xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Nueva Cita
        </h1>
@if ($errors->any())

    <div class="bg-red-200 text-red-800 p-4 rounded mb-4">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
        <form action="{{ route('citas.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-4">

                <label class="block mb-2">
                    Cliente
                </label>

                <select name="cliente_id"
                        required
                        class="w-full border rounded p-2">
@error(cliente_id) 

    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
    
@enderror
                    <option value="">
                        Selecciona cliente
                    </option>

                    @foreach($clientes as $cliente)

                        <option value="{{ $cliente->id }}">
                            {{ $cliente->name }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Manicurista
                </label>

                <select name="manicurista_id"
                        required
                        class="w-full border rounded p-2">
@error('manicurista_id') 

    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
    
@enderror
                    <option value="">
                        Selecciona manicurista
                    </option>

                    @foreach($manicuristas as $manicurista)

                        <option value="{{ $manicurista->id }}">
                            {{ $manicurista->name }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Servicio
                </label>

                <select name="servicio_id"
                        id="servicio_id"
                        required
                        class="w-full border rounded p-2">
@error('servicio_id') 

    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
    
@enderror
                    <option value="">
                        Selecciona servicio
                    </option>

                    @foreach($servicios as $servicio)

                        <option value="{{ $servicio->id }}"
                                data-nombre="{{ strtolower($servicio->nombre) }}">

                            {{ $servicio->nombre }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Fecha
                </label>

                <input type="date"
                       name="fecha"
                       required
                       class="w-full border rounded p-2">
@error(fecha) 

    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
    
@enderror
            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Hora
                </label>

                <input type="time"
                       name="hora"
                       required
                       class="w-full border rounded p-2">
@error('hora') 

    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
    
@enderror
            </div>

            <div class="mb-4 hidden" id="imagen-container">

                <label class="block mb-2">
                    Foto actual de uñas
                </label>

                <input type="file"
                       name="imagen"
                       accept="image/*"
                       class="w-full border rounded p-2">
@error('imagen') 

    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
    
@enderror   
            </div>

            <button type="submit"
        class="bg-pink-500 text-white px-4 py-2 rounded">

                Guardar Cita

            </button>

        </form>

    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const servicioSelect =
                document.getElementById('servicio_id');

            const imagenContainer =
                document.getElementById('imagen-container');

            servicioSelect.addEventListener('change', function () {

                const selectedOption =
                    servicioSelect.options[servicioSelect.selectedIndex];

                const nombre =
                    selectedOption.dataset.nombre || '';

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