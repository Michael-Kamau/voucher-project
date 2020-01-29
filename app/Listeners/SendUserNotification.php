<?php

namespace App\Listeners;

use App\Events\BuyVoucherNotificationEvent;
use App\Mail\NotifyUserMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendUserNotification
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
     * @param  BuyVoucherNotificationEvent  $event
     * @return void
     */
    public function handle(BuyVoucherNotificationEvent $event)
    {
        //
        Log::alert('Triggered this listener');
        Mail::to($event->email)->send(new NotifyUserMail($event->name,$event->details));
    }
}
