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

class TimerUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('timer-channel'),
        ];
    }
/**
     * Datos que se enviarán con el evento.
     *
     * @return array
     */
    public function broadcastAs():string
    {
        return "relojkumite"; // Nombre del evento que se enviará al canal
    }
    // Puedes personalizar los datos que se envían con el evento aquí
    // Por ejemplo, puedes enviar la variable $data que has pasado al constructor   
    public function broadcastWith()
    {
        return [
            'data' => $this->data, // Enviar la variable como parte de los datos
        ];
    }
}

