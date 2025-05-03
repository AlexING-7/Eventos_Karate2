<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Combate;
use App\Models\competencia;
use App\Models\Grupo;
use App\Models\participantes;
use App\Models\Puntokata;
use Illuminate\Http\Request;

class PuntajeController extends Controller
{
    public static function puntajetotal_Kumite($id_competencia,$id_participante)
    {
        //en produccion 
        $participante=participantes::find($id_participante);
        $participante->combates()->where('id_competencia',$id_competencia)->get();

                
    }

    public static function puntajegrupo_Kumite($idgrupo,$id_participante)
    {     
        $sumar=array();
        $participante=participantes::find($id_participante);
        try {
            $grupo=$participante->grupos->where('id',$idgrupo)->first();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Grupo no encontrado'], 404);
        }

        if($grupo->competencia->categoria->disciplina == 'Kata'){
            return response()->json(['error' => 'No se puede crear un combate de kumite en una competencia de kumite'], 400);
        }

        foreach($grupo->rondas as $ronda){
            foreach($participante->combates as $combate){
                if($combate->id_ronda == $ronda->id){
                    $sumar[]=$combate->puntokumite->first()->total;
                }
            }
           
        }

        return array_sum($sumar);
                
    }
}
