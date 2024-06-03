<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EditClientNotificationAdmin extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $client;
    public $practitioner;

    public function __construct($client, $practitioner)
    {
        $this->client = $client;
        $this->practitioner = $practitioner;
    }

    public function build()
    {
        return $this->subject(' Existing Client Updated')
                    ->view('emails.editclientadmin');
    }
}
