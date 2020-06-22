<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldBroadcastNow
{
    use InteractsWithSockets, SerializesModels;
    public $notification;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($notification, User $user)
    {
        $this->notification = $notification;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        return new Channel('notification-channel');
    }

    public function broadcastAs()
    {
        return 'NotificationEvent';
    }

    public function broadcastWith()
    {
        return [
            'name' => $this->user->name,
            'notification' => $this->notification,
            'now' => date('Y-m-d H:i:s')
        ];
    }
}
