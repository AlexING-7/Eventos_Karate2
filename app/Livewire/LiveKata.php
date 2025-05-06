<?php

namespace App\Livewire;

use App\Models\combate;
use Livewire\Component;

class LiveKata extends Component
{
    public $id_combate;
    public $puntos1;
    public $puntos2;
    public $celdas1;
    public $celdas2;


    public $total1 = 0;

    public $total2 = 0;

    public $tatami;

    public $nombre1;

    public $dojo1;

    public $nombre2;

    public $dojo2;
    public $kata1;
    public $kata2;

    public $categoria;
    public $ronda;

    public $cinturon1;
    public $cinturon2;

    public function mount($id_combate)
    {
        $this->puntos1 = array_fill_keys(['juez1', 'juez2', 'juez3', 'juez4', 'juez5', 'juez6', 'juez7'], 0);
        $this->puntos2 = array_fill_keys(['juez1', 'juez2', 'juez3', 'juez4', 'juez5', 'juez6', 'juez7'], 0);
        $this->celdas1 = array_fill_keys(['juez1', 'juez2', 'juez3', 'juez4', 'juez5', 'juez6', 'juez7'], True);
        $this->celdas2 = array_fill_keys(['juez1', 'juez2', 'juez3', 'juez4', 'juez5', 'juez6', 'juez7'], True);
        
        $dato = combate::find($id_combate);
        $datos = $dato->with(['tatami', 'ronda', 'competencia.categoria', 'equiposkata'])->get()->first();
        $this->tatami = $datos->tatami->nombre;
        $this->categoria = strtoupper($datos->competencia->categoria->disciplina ." ". $datos->competencia->categoria->genero);
        $this->ronda = $datos->ronda->nombre;
        $this->kata1 = $dato->equiposkata[0]->presentacionkata->first();
        $this->kata2 = $dato->equiposkata[1]->presentacionkata->first();

        
        $participante1 = $dato->equiposkata[0]->participantes->first();
        $participante2 = $dato->equiposkata[1]->participantes->first();
        
        $this->nombre1 = strtoupper($participante1->primer_nombre . " "  . $participante1->primer_apellido) ;
        $this->nombre2 = strtoupper($participante2->primer_nombre . " " . $participante2->primer_apellido );

        $this->dojo1 = strtoupper($participante1->dojo);
        $this->dojo2 = strtoupper($participante2->dojo);

        $this->cinturon1 = strtoupper($participante1->cinturon);
        $this->cinturon2 = strtoupper($participante2->cinturon);
        $puntoskata1 = $dato->equiposkata[0]->puntokata->first();
        $puntoskata2 = $dato->equiposkata[1]->puntokata->first();

        // foreach (range(1, 7) as $i) {
        //     $this->puntos1["juez$i"] = $puntoskata1->puntosjuezkata[$i - 1]->puntaje;
        //     $this->puntos2["juez$i"] = $puntoskata2->puntosjuezkata[$i - 1]->puntaje;
        // }

        // $this->total1 = $puntoskata1->total;
        // $this->total2 = $puntoskata2->total;
    }

    public function refresh()
    {

    }
    public function render()
    {
        return view('livewire.kata.livekata2');
    }
}
