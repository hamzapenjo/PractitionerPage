<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Practice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomePractitionerAdmin extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $practice;
    public $practitioner;

    public function __construct($practice, $practitioner)
    {
        $this->practice = $practice;
        $this->practitioner = $practitioner;
    }

    public function build()
    {
        return $this->subject('Welcome to Our Service')
                    ->view('emails.welcomepractitioneradmin');
    }
}
