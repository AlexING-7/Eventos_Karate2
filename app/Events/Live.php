<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Live implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $data;
    public function __construct($data)
    {
        $this->data = $data; // Asignar la variable a la propiedad de la clase
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        return new Channel('channel'); // Nombre del canal
    }

    /**
     * Datos que se enviarán con el evento.
     *
     * @return array
     */
    public function broadcastAs():string
    {
        return "live"; // Nombre del evento que se enviará al canal
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
