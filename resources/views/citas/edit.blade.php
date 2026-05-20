<x-app-layout>

    <div class="py-6 px-6 max-w-2xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Editar Cita
        </h1>

        <form action="{{ route('citas.update', $cita) }}"
              method="POST"
              class="bg-white p-6 rounded shadow">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2">
                    Cliente
                </label>

                <select name="cliente_id"
                        required
                        class="w-full border rounded p-2">

                    @foreach($clientes as $cliente)

                        <option value="{{ $cliente->id }}"
                            {{ $cita->cliente_id == $cliente->id ? 'selected' : '' }}>

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

                    @foreach($manicuristas as $manicurista)

                        <option value="{{ $manicurista->id }}"
                            {{ $cita->manicurista_id == $manicurista->id ? 'selected' : '' }}>

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

                    @foreach($servicios as $servicio)

                        <option value="{{ $servicio->id }}"
                            {{ $cita->servicio_id == $servicio->id ? 'selected' : '' }}>

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
                       value="{{ $cita->fecha }}"
                       required
                       class="w-full border rounded p-2">

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Hora
                </label>

                <input type="time"
                       name="hora"
                       value="{{ $cita->hora }}"
                       required
                       class="w-full border rounded p-2">

            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">

                Actualizar Cita

            </button>

        </form>

    </div>

</x-app-layout>