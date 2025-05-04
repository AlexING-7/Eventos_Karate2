<?php

namespace App\Livewire\Kumite;

use App\Events\LiveKumite;
use App\Events\TimerUpdated;
use Livewire\Component;
use Ramsey\Uuid\Type\Time;

class ScoreboardKumite extends Component
{
    public int $scoreA = 0;
    public int $scoreB = 0;

    public $faltasB = [];
    public $faltasA = [];
    public bool $senshuA = false;
    public bool $senshuB = false;

    public int $remaining = 180;
    public bool $running = false;

    protected array $faltasOrder = ['1C', '2C', '3C', 'HC', 'H'];

    public function mount()
    {
        $this->faltasA = [];
        $this->faltasB = [];
        $this->running = false;
        $this->remaining = 180;
    }
    protected function ordenarFaltas(&$faltas)
    {
        usort($faltas, function ($a, $b) {
            $order = $this->faltasOrder;
            return array_search($a, $order) <=> array_search($b, $order);
        });
    }

    public function addScore($player, $points)
    {
        if ($points === 1) {
            ;
        }
        if ($points === 2) {
            ;
        }
        if ($points === 3) {
            ;
        }

        if ($player === 'A') {
            $this->scoreA += $points;
        } elseif ($player === 'B') {
            $this->scoreB += $points;
        }
        LiveKumite::dispatch([
            'type'=>'score',
            'scoreA' => $this->scoreA, 
            'scoreB' => $this->scoreB
        ]);
    }

    public function toggleSenshu($player)
    {
        if ($player === 'A') {
            $this->senshuA = !$this->senshuA;
        } elseif ($player === 'B') {
            $this->senshuB = !$this->senshuB;
        }
        LiveKumite::dispatch([
            'type'=>'senshu',
            'senshuA' => $this->senshuA,
            'senshuB' => $this->senshuB            
        ]);
    }

    public function toggleTimer()
    {
        $this->running = !$this->running;
         
    
    }

    public function Warning(){
        $this->ordenarFaltas($this->faltasA);
        $this->ordenarFaltas($this->faltasB);
        LiveKumite::dispatch([
            'type'=>'faltas',
            'faltasA' => $this->faltasA,
            'faltasB' => $this->faltasB            
        ]);
    }

    public function resetTimer()
    {
        $this->running = false;
        $this->remaining = 180;
        TimerUpdated::dispatch(['remaining'=>$this->remaining]);
    }

    public function decrementTimer()
    {
        if ($this->running && $this->remaining > 0) {
            $this->remaining--;
        }
        TimerUpdated::dispatch(['remaining'=>$this->remaining]);
    }

    public function render()
    {
        if ($this->running) {
            $this->decrementTimer();
        }
        
        return view('livewire.kumite.scoreboard-kumite');
    }
}
