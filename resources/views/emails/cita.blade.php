<h1>Nueva cita registrada</h1>

<p>
    Hola {{ $cita->cliente->name }}
</p>

<p>
    Tu cita fue registrada correctamente.
</p>

<p>
    Servicio:
    {{ $cita->servicio->nombre }}
</p>

<p>
    Fecha:
    {{ $cita->fecha }}
</p>

<p>
    Hora:
    {{ $cita->hora }}
</p>