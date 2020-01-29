<?php

namespace App\Listeners;

use App\Mail\NotifyAdminMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NotifyAdminVoucherBoughtListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        //Mail::to('kamau.karitu@gmail.com')->send(new NotificationMail())
        \Mail::to('kamau.karitu@gmail.com')->send(new NotifyAdminMail($event->name,$event->email,$event->details));

    }
}
