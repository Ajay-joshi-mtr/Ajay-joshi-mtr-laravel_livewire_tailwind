<?php

namespace App\Events;

use App\Models\Specialization;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SpecializationCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $specialization;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Specialization $specialization)
    {
        $this->specialization = $specialization;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
