<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class registrarCita extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre_cliente;
    public $nombre_mascota;

    public $servicio_cita;
    public $fecha_cita;
    /**
     * Create a new message instance.
     */
    public function __construct($nombre_cliente, $nombre_mascota, $servicio_cita, $fecha_cita)
    {
        $this->nombre_cliente = $nombre_cliente;
        $this->nombre_mascota = $nombre_mascota;
        $this->servicio_cita = $servicio_cita;
        $this->fecha_cita = $fecha_cita;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitud de cita recibida',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'citas',
            with: [
                'nombre_cliente' => $this->nombre_cliente,
                'nombre_mascota' => $this->nombre_mascota,
                'servicio_cita' => $this->servicio_cita,
                'fecha_cita' => $this->fecha_cita,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
