<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TableMoveEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order_id;
    public $display_table_name;
    public $first_table_id;

    public function __construct($var1, $var2, $var3)
    {
        $this->order_id = $var1;
        $this->display_table_name = $var2;
        $this->first_table_id = $var3;
    }

    public function broadcastOn()
    {
        //public channel
        return new Channel('table-move-channel');
    }
}
