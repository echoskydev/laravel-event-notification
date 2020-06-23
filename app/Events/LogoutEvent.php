<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogoutEvent implements ShouldBroadcastNow
{
    use InteractsWithSockets, SerializesModels;
    public $user_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        return new Channel('logout-channel');
    }

    public function broadcastAs()
    {
        return 'LogoutEvent';
    }

    public function broadcastWith()
    {
        return [
            'user_id' => $this->user_id,
            'now' => date('Y-m-d H:i:s')
        ];
    }
}
