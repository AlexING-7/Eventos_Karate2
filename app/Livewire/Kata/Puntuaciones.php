<?php

namespace App\Livewire\Kata;

use App\Models\combate;
use Livewire\Component;

class Puntuaciones extends Component
{
    public $puntos1=[
        'juez1'=>0,
        'juez2'=>0,
        'juez3'=>0,
        'juez4'=>0,
        'juez5'=>0,
        'juez6'=>0,
        'juez7'=>0
    ]; 

    public $puntos2=[
        'juez1'=>0,
        'juez2'=>0,
        'juez3'=>0,
        'juez4'=>0,
        'juez5'=>0,
        'juez6'=>0,
        'juez7'=>0
    ]; 
    public $celdas1=[
        'juez1'=>True,
        'juez2'=>True,
        'juez3'=>True,
        'juez4'=>True,
        'juez5'=>True,
        'juez6'=>True,
        'juez7'=>True
    ]; 

    public $celdas2=[
        'juez1'=>True,
        'juez2'=>True,
        'juez3'=>True,
        'juez4'=>True,
        'juez5'=>True,
        'juez6'=>True,
        'juez7'=>True
    ]; 
    

    public $total1=0;

    public $total2=0;

    public $nombre1;

    public $nombre2;

    public $kata1;
    public $kata2;

    public $categoria;

    public function mount(){
        $dato=combate::find(1);
        $datos=$dato->with(['tatami','ronda','competencia.categoria','equipokata'])->get()->first();

        $this->categoria=$datos->competencia->categoria->disciplina . $datos->competencia->categoria->genero . "|" . $datos->ronda->nombre;
        $participante1=$datos->equipokata[0]->participantes->first();
        $this->kata1=$datos->equipokata[0]->presentacionkata->first();
        $this->kata2=$datos->equipokata[1]->presentacionkata->first();
        $participante2=$datos->equipokata[1]->participantes->first();
        $this->nombre1=$participante1->primer_nombre . " "  . $participante1->primer_apellido . " (" . $participante1->dojo . ")";
        $this->nombre2=$participante2->primer_nombre . " " . $participante2->primer_apellido . " (" . $participante2->dojo . ")" ;
    }

    public function save(){
        asort($this->puntos1);
        asort($this->puntos2);
        foreach(array_keys($this->puntos1) as $index=>$keys){
            if($index===0 or $index===6){
                $this->celdas1[$keys]=False;
            }else{
                $this->celdas1[$keys]=True;
            }
  
        }
        foreach(array_keys($this->puntos2) as $index=>$keys){
            if($index===0 or $index===6){
                $this->celdas2[$keys]=False;
            }else{
                $this->celdas2[$keys]=True;
            }
  
        }
        $suma1=array_slice($this->puntos1,1,5);
        $suma2=array_slice($this->puntos2,1,5);
        $this->total1=array_sum($suma1);
        $this->total2=array_sum($suma2);
    }
    public function render()
    {
        return view('livewire.kata.puntuaciones');
    }
}
