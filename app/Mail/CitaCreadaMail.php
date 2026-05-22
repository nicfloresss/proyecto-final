<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CitaCreadaMail extends Mailable
{
    use Queueable, SerializesModels;

    // Aquí guardaremos los datos de la cita
    public $cita;

    // El constructor recibe la cita desde el controlador
    public function __construct($cita)
    {
        $this->cita = $cita;
    }

    // Definimos el Asunto del correo
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Tu cita de uñas ha sido confirmada!',
        );
    }

    // Le decimos que busque la vista en resources/views/emails/cita.blade.php
    public function content(): Content
    {
        return new Content(
            view: 'emails.cita',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}