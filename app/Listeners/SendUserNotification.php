<?php

namespace App\Listeners;

use App\Events\BuyVoucherNotificationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

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
    }
}
