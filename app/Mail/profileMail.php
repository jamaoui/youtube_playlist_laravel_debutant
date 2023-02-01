<?php

namespace App\Mail;

use App\Models\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class profileMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private Profile $profile)
    {
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Profile confirmation',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $date = $this->profile->created_at;
        $id = $this->profile->id;

        $href = url('').'/verify_email/'.base64_encode($date.'///'.$id);
        return new Content(
            view: 'emails.inscription',
            with:[
                'email' => $this->profile->email,
                'name' => $this->profile->name,
                'href' => $href
            ]

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
  
        return [];
    }
}
