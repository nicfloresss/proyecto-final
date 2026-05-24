<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Cita</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; border: 1px solid #eee;">
        <h2 style="color: #e91e63; text-align: center;">¡Hola, {{ $cita->cliente->name ?? 'Hermosa' }}! Tu cita ha sido agendada con éxito 💅✨</h2>
        <p>Gracias por agendar con nosotros. Aquí tienes el resumen y los detalles de tu cita:</p>
        
        <hr style="border: 0; border-top: 1px solid #eee;">
        
        <div style="background-color: #fff0f5; padding: 15px; border-radius: 8px; margin: 15px 0; border-left: 4px solid #e91e63;">
            <p style="margin: 5px 0;"><strong>💝 Servicio:</strong> {{ $cita->servicio->nombre ?? 'Servicio solicitado' }}</p>
            <p style="margin: 5px 0;"><strong>📅 Fecha:</strong> {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</p>
            <p style="margin: 5px 0;"><strong>⏰ Hora:</strong> {{ \Carbon\Carbon::parse($cita->hora)->format('g:i A') }}</p>
            @if(isset($cita->manicurista))
                <p style="margin: 5px 0;"><strong>👩‍🎨 Profesional:</strong> {{ $cita->manicurista->name }}</p>
            @endif
        </div>
        
        <hr style="border: 0; border-top: 1px solid #eee;">
        
        <p>Su cita ha quedado registrada correctamente en nuestro sistema.</p>
        
        <hr style="border: 0; border-top: 1px solid #eee;">
        
        <p style="text-align: center; color: #777; font-size: 12px;">Te esperamos en nuestro salón. ¡Que tengas un hermoso día!</p>
    </div>

</body>
</html>