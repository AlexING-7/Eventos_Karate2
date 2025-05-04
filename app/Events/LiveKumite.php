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

class LiveKumite implements ShouldBroadcastNow
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
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('channel-Kumite'), // Nombre del canal
        ];
    }
    /**
     * Datos que se enviarán con el evento.
     *
     * @return array
     */
    public function broadcastAs():string
    {
        return "livekumite"; // Nombre del evento que se enviará al canal
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
