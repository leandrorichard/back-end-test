<?php

namespace App\Events;

use App\Produto;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProdutoCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $produto;

    /**
     * Create a new event instance.
     *
     * @param Produto $produto
     */
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
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
