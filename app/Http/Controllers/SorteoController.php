<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\participantes;
use App\Models\categoria;
use App\Models\Grupo;

class SorteoController extends Controller
{
    public function sortear(Request $request)
    {
        $allParticipants = participantes::all();
        $categories = categoria::all();
        $result = [];
        $maxAttempts = 100;

        foreach ($categories as $cat) {
            // Filtrar participantes según la categoría:
            // Cumplen: género, edad (≥ edad_min y si existe edad_max, ≤ edad_max) y mismo peso.
            $filtered = $allParticipants->filter(function ($participant) use ($cat) {
                $age = $participant->edad;
                $ageOk = $age >= $cat->edad_min;
                if ($cat->edad_max !== null) {
                    $ageOk = $ageOk && ($age <= $cat->edad_max);
                }
                return $participant->genero === $cat->genero &&
                       $ageOk &&
                       (float)$participant->peso === (float)$cat->peso;
            })->values()->all();

            // Se exige mínimo 8 grupos de 4 participantes = 32 en total.
            if (count($filtered) < 32 || count($filtered) % 4 !== 0) {
                $result[$cat->nombre] = [
                    'error' => 'La cantidad de participantes filtrados debe ser múltiplo de 4 y al menos 32 para formar 8 grupos.'
                ];
                continue;
            }

            $successful = false;
            $groups = []; // Inicialización de grupos

            // Se intenta la asignación hasta $maxAttempts veces
            for ($attempt = 0; $attempt < $maxAttempts && !$successful; $attempt++) {
                $tempParticipants = $filtered;
                shuffle($tempParticipants);
                $numGroups = count($tempParticipants) / 4;  // Se adapta a la cantidad de participantes
                // Se exige como mínimo 8 grupos
                if ($numGroups < 8) {
                    continue;
                }
                $groups = array_fill(0, $numGroups, []);
                $failed = false;

                foreach ($tempParticipants as $participant) {
                    $assigned = false;
                    $groupKeys = array_keys($groups);
                    shuffle($groupKeys);

                    // Buscar grupos disponibles donde NO exista aún el dojo del participante
                    $idealGroups = [];
                    foreach ($groupKeys as $key) {
                        if (count($groups[$key]) < 4) {
                            $dojosInGroup = array_column($groups[$key], 'dojo');
                            if (!in_array($participant->dojo, $dojosInGroup)) {
                                $idealGroups[] = $key;
                            }
                        }
                    }
                    if (!empty($idealGroups)) {
                        $chosenKey = $idealGroups[array_rand($idealGroups)];
                        $groups[$chosenKey][] = $participant;
                        $assigned = true;
                    } else {
                        // Si no hay grupos "ideales", se permite asignar a cualquier grupo que aún no esté completo.
                        $availableKeys = [];
                        foreach ($groupKeys as $key) {
                            if (count($groups[$key]) < 4) {
                                $availableKeys[] = $key;
                            }
                        }
                        if (!empty($availableKeys)) {
                            $chosenKey = $availableKeys[array_rand($availableKeys)];
                            $groups[$chosenKey][] = $participant;
                            $assigned = true;
                        }
                    }
                    if (!$assigned) {
                        $failed = true;
                        break;
                    }
                }

                // Verificar que cada grupo tenga exactamente 4 integrantes
                foreach ($groups as $group) {
                    if (count($group) != 4) {
                        $failed = true;
                        break;
                    }
                }
                if (!$failed) {
                    $successful = true;
                }
            }

            if (!$successful) {
                $result[$cat->nombre] = [
                    'error' => 'No se pudo completar la asignación tras múltiples intentos para la categoría.'
                ];
            } else {
                // Guardar los grupos en la BD usando el modelo Grupo
                $savedGroups = [];
                foreach ($groups as $index => $groupParticipants) {
                    $grupoRecord = Grupo::create([
                        'nombre' => $cat->nombre . ' Grupo ' . ($index + 1),
                        'numero' => $index + 1,
                        'id_competencia' => 1 // O asignar un valor de competencia según corresponda
                    ]);
                    
                    // Recopilar los IDs de los participantes y asignarlos al grupo
                    $participantIDs = [];
                    foreach ($groupParticipants as $p) {
                        $participantIDs[] = $p->id;
                    }
                    $grupoRecord->participantes()->attach($participantIDs);
                    
                    $savedGroups[] = $grupoRecord;
                }
                $result[$cat->nombre] = [
                    'message' => 'Sorteo realizado exitosamente',
                    'groups' => $savedGroups
                ];
            }
        }

        return $request->wantsJson()
            ? response()->json($result)
            : view('sorteo', compact('result'));
    }
}