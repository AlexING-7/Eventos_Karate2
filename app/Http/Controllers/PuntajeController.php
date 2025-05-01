<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Combate;
use App\Models\competencia;
use App\Models\participantes;
use App\Models\Puntokata;
use Illuminate\Http\Request;

class PuntajeController extends Controller
{
    public static function puntajetotal_Kumite($id_competencia,$id_participante)
    {
        $compe = competencia::find($id_competencia);
        $suma = array();
        foreach ($compe->combates as $combate) {
            foreach ($combate->puntokumite as $puntos) {
                if ($puntos->id_participante == $id_participante) {
                    $suma[] = $puntos->total;
                }
            }
        }
        return array_sum($suma);
    }
    public static function puntajetotal_Kata($id_competencia,$id_participante)
    {
        $compe = competencia::find($id_competencia);
        $suma = array();
        foreach ($compe->combates as $combate) {
            foreach ($combate->puntokata as $puntos) {
                if ($puntos->id_participante == $id_participante) {
                    $suma[] = $puntos->total;
                }
            }
        }
        return array_sum($suma);
    }
}
