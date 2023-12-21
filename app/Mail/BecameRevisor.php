<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BecameRevisor extends Mailable
{
    use Queueable, SerializesModels;
    public $nome;
    public $cognome;
    public $testo;   
    public $email;   
    /**
     * Create a new message instance.
     */
    public function __construct($_nome,$_cognome,$_testo, $_email)
    {
        $this->nome=$_nome;
        $this->cognome=$_cognome;
        $this->testo=$_testo;
        $this->email=$_email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('requestrevisor@presto.it', 'Presto.it'),
            subject: 'New revisor request',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.becomeRevisor',
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
