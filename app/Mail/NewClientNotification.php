<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewClientNotification extends Mailable implements ShouldQueue
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
        sleep(15);
        return $this->subject('New Client Created')
                    ->view('emails.newclient');
    }
}
