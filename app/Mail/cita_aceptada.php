<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class cita_aceptada extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $name;
    public $petName;
    public $service;
    public $appointmentDate;
    public function __construct($name, $petName, $service, $appointmentDate)
    {
        $this->name = $name;
        $this->petName = $petName;
        $this->service = $service;
        $this->appointmentDate = $appointmentDate;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cita Aceptada',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'cita_aceptada',
            with: [
                'name' => $this->name,
                'petName' => $this->petName,
                'service' => $this->service,
                'appointmentDate' => $this->appointmentDate,
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
