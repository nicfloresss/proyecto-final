<x-app-layout>

    <div class="py-6 px-6 max-w-2xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Nueva Cita
        </h1>

        <form action="{{ route('citas.store') }}"
              method="POST"
              class="bg-white p-6 rounded shadow">

            @csrf

            <div class="mb-4">

                <label class="block mb-2">
                    Cliente
                </label>

                <select name="cliente_id"
                        required
                        class="w-full border rounded p-2">

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
                        required
                        class="w-full border rounded p-2">

                    <option value="">
                        Selecciona servicio
                    </option>

                    @foreach($servicios as $servicio)

                        <option value="{{ $servicio->id }}">
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

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Hora
                </label>

                <input type="time"
                       name="hora"
                       required
                       class="w-full border rounded p-2">

            </div>

            <button class="bg-pink-500 text-white px-4 py-2 rounded">

                Guardar Cita

            </button>

        </form>

    </div>

</x-app-layout>