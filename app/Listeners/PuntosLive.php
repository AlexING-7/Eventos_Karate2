<?php

namespace App\Listeners;

use App\Events\LiveKumite;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Reverb\Loggers\Log;

class PuntosLive 
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LiveKumite $event): void
    {
        $data = $event->data;

        
    }
}
