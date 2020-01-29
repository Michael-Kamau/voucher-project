<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $action;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $action, $details)
    {
        //
        $this->name=$name;
        $this->action=$action;
        $this->details=$details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notify-admin');
    }
}
