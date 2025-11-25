<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactUs extends Mailable implements ShouldQueue
{
   
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private $details)
    {
        $this->details = $details;
    }

    /**
     * Get the message envelope.
     */
         public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Us Notification',
            from: new Address('info@expertlinksolutions.org', 'Contact Us')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view:  'emails.contact-us',
            with: [
                'details' => $this->details,
            ]
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
