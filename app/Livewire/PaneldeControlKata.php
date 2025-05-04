<?php

namespace App\Livewire;

use App\Events\LiveKata;
use App\Models\combate;

use Livewire\Component;

class PaneldeControlKata extends Component
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

    public $nombre2;

    public $kata1;
    public $kata2;

    public $categoria;

    public function mount($id_combate)
    {
        $this->puntos1 = array_fill_keys(['juez1', 'juez2', 'juez3', 'juez4', 'juez5', 'juez6', 'juez7'], 0);
        $this->puntos2 = array_fill_keys(['juez1', 'juez2', 'juez3', 'juez4', 'juez5', 'juez6', 'juez7'], 0);
        $this->celdas1 = array_fill_keys(['juez1', 'juez2', 'juez3', 'juez4', 'juez5', 'juez6', 'juez7'], True);
        $this->celdas2 = array_fill_keys(['juez1', 'juez2', 'juez3', 'juez4', 'juez5', 'juez6', 'juez7'], True);
        
        $dato = combate::find($id_combate);
        $datos = $dato->with(['tatami', 'ronda', 'competencia.categoria', 'equiposkata'])->get()->first();
        $this->tatami = $datos->tatami->nombre;
        $this->categoria = $datos->competencia->categoria->disciplina . $datos->competencia->categoria->genero . "|" . $datos->ronda->nombre;
        
        $this->kata1 = $datos->equiposkata[0]->presentacionkata->first();
        $this->kata2 = $datos->equiposkata[1]->presentacionkata->first();
        
        $participante1 = $datos->equiposkata[0]->participantes->first();
        $participante2 = $datos->equiposkata[1]->participantes->first();
        
        $this->nombre1 = $participante1->primer_nombre . " "  . $participante1->primer_apellido . " (" . $participante1->dojo . ")";
        $this->nombre2 = $participante2->primer_nombre . " " . $participante2->primer_apellido . " (" . $participante2->dojo . ")";

        $puntoskata1 = $datos->equiposkata[0]->puntokata->first();
        $puntoskata2 = $datos->equiposkata[1]->puntokata->first();

        foreach (range(1, 7) as $i) {
            $this->puntos1["juez$i"] = $puntoskata1->puntosjuezkata[$i - 1]->puntaje;
            $this->puntos2["juez$i"] = $puntoskata2->puntosjuezkata[$i - 1]->puntaje;
            $this->celdas1["juez$i"] = $puntoskata1->puntosjuezkata[$i - 1]->sesgo;
            $this->celdas2["juez$i"] = $puntoskata2->puntosjuezkata[$i - 1]->sesgo;
        }

        $this->total1 = $puntoskata1->total;
        $this->total2 = $puntoskata2->total;
    }

    public function save($id_combate)
    {
        asort($this->puntos1);
        asort($this->puntos2);
        foreach (array_keys($this->puntos1) as $index => $keys) {
            if ($index === 0 or $index === 6) {
                $this->celdas1[$keys] = False;
            } else {
                $this->celdas1[$keys] = True;
            }
        }
        foreach (array_keys($this->puntos2) as $index => $keys) {
            if ($index === 0 or $index === 6) {
                $this->celdas2[$keys] = False;
            } else {
                $this->celdas2[$keys] = True;
            }
        }
        $suma1 = array_slice($this->puntos1, 1, 5);
        $suma2 = array_slice($this->puntos2, 1, 5);
        $this->total1 = array_sum($suma1);
        $this->total2 = array_sum($suma2);

        $dato = combate::find($id_combate);
        $datos = $dato->with(['tatami', 'ronda', 'competencia.categoria', 'equiposkata'])->get()->first();

        $puntoskata1 = $datos->equiposkata[0]->puntokata->first();
        $puntoskata2 = $datos->equiposkata[1]->puntokata->first();
        foreach (range(1, 8) as $i) {
            if ($i !== 8) {
                $puntoskata1->puntosjuezkata[$i - 1]->update([
                    'puntaje' => $this->puntos1['juez' . $i],
                    'sesgo' => $this->celdas1['juez' . $i],
                ]);
                $puntoskata2->puntosjuezkata[$i - 1]->update([
                    'puntaje' => $this->puntos2['juez' . $i],
                    'sesgo' => $this->celdas2['juez' . $i],
                ]);

            } else {
                $puntoskata1->update([
                    'total' => $this->total1,
                ]);
                $puntoskata2->update([
                    'total' => $this->total2,
                ]);
            }
        }
        LiveKata::dispatch([
            'puntos1' => $this->puntos1,
            'puntos2' => $this->puntos2,
            'total1' => $this->total1,
            'total2' => $this->total2,
            'celdas1' => $this->celdas1,
            'celdas2' => $this->celdas2,
        ]);
    }
    public function render()
    {
        return view('livewire.kata.panelkata');
    }
}
