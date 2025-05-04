<?php

namespace App\Livewire\Kumite;

use Livewire\Component;

class LiveKumite extends Component
{
    public $id_combate;
    public $time = 180; // en segundos
    public $scoreA = 0;
    public $scoreB = 0;
    public $running = false;

    public $warningsA = [];
    public $warningsB = [];
    public $senshuA = False;
    public $senshuB = True;

    public function mount($id_combate)
    {
        
    }





    public function render()
    {
        return view('livewire.kumite.livekumite');
    }
}
