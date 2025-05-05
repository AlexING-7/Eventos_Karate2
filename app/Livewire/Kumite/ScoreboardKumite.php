<?php

namespace App\Livewire\Kumite;

use App\Events\LiveKumite;
use App\Events\TimerUpdated;
use App\Models\categoria;
use App\Models\Combate;
use Livewire\Component;
use Ramsey\Uuid\Type\Time;

class ScoreboardKumite extends Component
{
    public $id_combate;

    public $combate;

    public $categoria;

    public $ronda;
    public int $scoreA = 0;
    public int $scoreB = 0;

    public $faltasB = [];
    public $faltasA = [];
    public bool $senshuA;
    public bool $senshuB;

    public int $remaining = 180;
    public bool $running = false;

    public $participantes1,$rojo;
    public $participantes2,$azul;

    public $tatami;

    protected array $faltasOrder = ['1C', '2C', '3C', 'HC', 'H'];

    public function mount($id_combate)
    {
        $this->combate=Combate::find($id_combate);
        $datos = $this->combate->with(['tatami', 'ronda', 'competencia.categoria', 'participantes'])->get()->first();
       
        $this->categoria=strtoupper($datos->competencia->categoria->disciplina . ' ' . $datos->competencia->categoria->genero);
        $this->ronda=strtoupper($datos->ronda->nombre);
        $this->tatami = $datos->tatami->nombre;
        foreach($this->combate->puntokumite as $p){
            if($p->color == 'rojo'){
                $this->rojo = $p;
                $this->participantes1 = strtoupper($p->participante->primer_nombre .' '.$p->participante->primer_apellido );
                $this->scoreA = $p->total;
                $this->senshuA = $p->senshu;
            }else{
                $this->azul = $p;
                $this->participantes2 = strtoupper($p->participante->primer_nombre .' '.$p->participante->primer_apellido );
                $this->scoreB = $p->total;
                $this->senshuB = $p->senshu;
            }
        }
        $this->faltasA = [];
        $this->faltasB = [];
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
        

        if ($player === 'A') {
            $this->scoreA += $points;
            if ($points === 1) {
                $this->rojo->yuko += 1;
                $this->rojo->save();
            }
            if ($points === 2) {
                $this->rojo->waza_ari += 1;
                $this->rojo->save();
            }
            if ($points === 3) {
                $this->rojo->ippon += 1;
                $this->rojo->save();
            }
            
        } elseif ($player === 'B') {
            $this->scoreB += $points;
            if ($points === 1) {
                $this->azul->yuko += 1;
                $this->azul->save();
            }
            if ($points === 2) {
                $this->azul->waza_ari += 1;
                $this->azul->save();
            }
            if ($points === 3) {
                $this->azul->ippon += 1;
                $this->azul->save();
            }
            
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
            $this->rojo->senshu = $this->senshuA;
            $this->rojo->save();
        } elseif ($player === 'B') {
            $this->azul->senshu = $this->senshuB;
            $this->azul->save();
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
