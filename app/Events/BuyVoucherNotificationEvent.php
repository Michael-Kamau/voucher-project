<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BuyVoucherNotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $email;
    public $name;
    public $details;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name,$email, $details)
    {
        //
        $this->name=$name;
        $this->email=$email;
        $this->details=$details;
    }

//    /**
//     * Get the channels the event should broadcast on.
//     *
//     * @return \Illuminate\Broadcasting\Channel|array
//     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('channel-name');
//    }
}
