<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Combate;
use App\Models\competencia;
use App\Models\participantes;
use App\Models\Puntokata;
use Exception;
use Illuminate\Http\Request;

class PuntajeController extends Controller
{
    public static function puntajetotal_Kumite($id_competencia, $id_participante)
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
    public static function puntajetotal_Kata($id_competencia, $id_participante)
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

    public static function puntajegrupo_Kumite($idgrupo, $id_participante)
    {
        
        $participante = participantes::find($id_participante);
        try {
            $grupo = $participante->grupos->where('id', $idgrupo)->first();
        } catch (Exception $e) {
            return response()->json(['error' => 'Grupo no encontrado'], 404);
        }

        if ($grupo->competencia->categoria->disciplina == 'Kata') {
            return response()->json(['error' => 'No se puede crear un combate de kumite en una competencia de kumite'], 400);
        }
        $suma = [];
        foreach ($grupo->rondas as $ronda) {
            foreach ($ronda->combates as $combate) {
                foreach ($combate->puntokumite as $puntos) {
                    if ($puntos->id_participante == $id_participante) {
                        $suma[] = $puntos->total;
                    }
                }
            }
        }

        return $grupo->participantes;//array_sum($suma);
    }
}
