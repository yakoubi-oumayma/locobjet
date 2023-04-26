<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class welcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The email content.
     *
     * @var string
     */
    public $content;
    public function __construct(string $content)
    {
        $this->content = $content;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        $this->withSwiftMessage(function ($message) {
            $message->getHeaders()
                ->addTextHeader('X-Mailgun-Tag', 'welcome-email')
                ->addTextHeader('X-Mailgun-Dkim', 'yes')
                ->addTextHeader('X-Mailgun-Spf', 'yes')
                ->addTextHeader('X-Mailgun-Track', 'opens');
        });
        $messageBody = $this->content;
        return $this->subject('Welcome Mail')->html($messageBody);
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
