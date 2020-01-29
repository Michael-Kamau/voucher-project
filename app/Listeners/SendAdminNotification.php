<?php

namespace App\Listeners;

use App\Events\BuyVoucherNotificationEvent;
use App\Mail\NotifyAdminMail;
use App\Providers\BuyVoucherNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAdminNotification
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
        Log::alert("Triggered the Notify admin event");
        Mail::to(Auth::user())->send(new NotifyAdminMail($event->name,$event->email,$event->details));

    }
}
