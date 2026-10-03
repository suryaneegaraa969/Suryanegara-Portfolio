<?php
// app/Mail/ContactFormMail.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $senderName,
        public string $senderEmail,
        public string $contactSubject,
        public string $messageContent,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Portfolio Contact — ' . $this->senderName . ' — ' . $this->contactSubject,
            replyTo: [$this->senderEmail],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
            with: [
                'subject' => $this->contactSubject,
            ],
        );
    }
}