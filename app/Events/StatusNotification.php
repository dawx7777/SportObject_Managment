<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;
    public $message;
   
    public function __construct($reservation)
    {
        
        $this->reservation=$reservation;
        $this->message="{$reservation} złożył rezerwacje";
    }

  
    public function broadcastOn()
    {
        return new Channel('posts');
    }
    public function broadcastWith(){

        return[
            'title' =>$this->reservation->title,
            'start'=>$this->reservation->start,
        ];
    }
}
