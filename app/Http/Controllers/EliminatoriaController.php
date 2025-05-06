<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\participantes;
use App\Http\Controllers\PuntajeController;
use App\Http\Controllers\CombatesController;

class EliminatoriaController extends Controller
{
    public function avanzarAEliminatorias(Request $request)
    {
        $winners = [];
        // Obtener todos los grupos (puedes filtrar por competencia si lo requieres)
        $groups = Grupo::with('participantes')->get();

        // Por cada grupo, calcular el ganador (el participante con mayor puntaje)
        foreach($groups as $group) {
            $bestScore = -1;
            $winner = null;
            // Se asume que cada grupo tiene varios participantes 
            foreach($group->participantes as $participant) {
                // Se utiliza la función puntajegrupo_Kumite para obtener el puntaje
                $score = PuntajeController::puntajegrupo_Kumite($group->id, $participant->id);
                if($score > $bestScore) {
                    $bestScore = $score;
                    $winner = $participant;
                }
            }
            if($winner) {
                $winners[] = $winner;
            }
        }

        // Verificar que el número de ganadores sea par para emparejarlos
        if(count($winners) % 2 !== 0) {
            return response()->json(['error' => 'El número de ganadores no es par, revise los grupos.'], 400);
        }

        $eliminationCombats = [];
        // Emparejar ganadores de dos en dos: [0] vs [1], [2] vs [3]…
        for($i = 0; $i < count($winners); $i += 2) {
            $participant1 = $winners[$i];
            $participant2 = $winners[$i + 1];
            
            // Se asume que en CombatesController tienes una función para crear combates para la eliminatoria,
            // por ejemplo, "crearCombateEliminatoria". Si no existe, deberás implementarla.
            $combat = CombatesController::crearCombateEliminatoria($participant1->id, $participant2->id);
            $eliminationCombats[] = $combat;
        }

        return response()->json([
            'message' => 'Eliminatorias creadas exitosamente',
            'combates' => $eliminationCombats,
            'winners' => $winners
        ]);
    }
}
