<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $email = $this->subject($this->details['subject'])
                      ->view('emails.notify')
                      ->with(['details' => $this->details]);

        if (!empty($this->details['attachments'])) {
            $filePath = storage_path('app/public/' . $this->details['attachments']);

            if (file_exists($filePath)) {
                $email->attach($filePath, [
                    'as' => basename($filePath),
                    'mime' => mime_content_type($filePath),
                ]);
            }
        }

        return $email;
    }
}
