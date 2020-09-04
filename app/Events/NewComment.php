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

class NewComment implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function broadcastOn()
    {
        return new Channel('post.' . $this->post->id);
    }

    public function broadcastAs()
    {
        return "NewComment";
    }

    public function broadcastWith()
    {
        return [
            'body' => $this->post->title,
            'author' => [
                'name' => $this->post->author->name,
                'avatar' => $this->post->author->avatar,
            ],
        ];
    }
}
