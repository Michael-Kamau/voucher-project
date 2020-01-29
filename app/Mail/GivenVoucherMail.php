<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GivenVoucherMail extends Mailable
{
    use Queueable, SerializesModels;
    public $verification_code;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$verification_code)
    {
        //
        $this->name=$name;
        $this->verification_code=$verification_code;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.given-mail');
    }
}
