<?php

namespace App\Livewire\Kumite;

use App\Models\Combate;
use Livewire\Component;
use Livewire\Attributes\Session;

class LiveKumite extends Component
{
    public $id_combate;
    public $combate;
    public $categoria;
    public $ronda;

    public $fase;
    public $rojo;
    public $azul;
    public $participantes1;
    public $participantes2;
    public $tatami;

    public $dojo1;
    public $dojo2;

    public $peso;

    #[Session]
    public $time; // en segundos
    public $scoreA;
    public $scoreB;
    public $running = false;

    public $faltasA = [];
    public $faltasB = [];
    public $senshuA;
    public $senshuB;

    public function mount($id_combate)
    {
        $this->combate=Combate::find($id_combate);
        $datos = $this->combate->with(['tatami', 'ronda', 'competencia.categoria', 'participantes'])->get()->first();
       
        $this->categoria=$datos->competencia->categoria;
        $this->peso = $datos->competencia->categoria->peso;
        $this->ronda=strtoupper($datos->ronda->nombre);

        $this->fase = strtoupper($datos->ronda->tipo) ==='eliminatoria' ? 'ELIMINATORIA' : strtoupper($datos->ronda->grupo->nombre);

        $this->tatami = $datos->tatami->nombre;
        foreach($this->combate->puntokumite as $p){
            if($p->color == 'rojo'){
                $this->rojo = $p;
                $this->participantes1 = $p->participante;
                $this->scoreA = $p->total;
                $this->senshuA = $p->senshu;
            }else{
                $this->azul = $p;
                $this->participantes2 = $p->participante;
                $this->scoreB = $p->total;
                $this->senshuB = $p->senshu;
            }
        }

        $this->faltasA = [];
        $this->faltasB = [];
    }
    public function render()
    {
        return view('livewire.kumite.livekumite2');
    }
}
