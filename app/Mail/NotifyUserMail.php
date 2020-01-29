<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUserMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$details)
    {
        //
        $this->name=$name;
        $this->details=$details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notify-user');
    }
}