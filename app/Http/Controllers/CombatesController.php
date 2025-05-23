<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Combate;
use App\Models\competencia;
use App\Models\EquipoKata;
use App\Models\Grupo;
use App\Models\participantes;
use App\Models\presentacionkata;
use App\Models\PuntoJuez;
use App\Models\Puntokata;
use App\Models\Ronda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\Type\TrueType;

class CombatesController extends Controller
{
    public static function CreateKata($id_tatami, $id_ronda, $id_competencia, $inicia, $ganador = null)
    {
        // Validar los parámetros de entrada
        if (empty($id_tatami) || empty($id_ronda) || empty($id_competencia) || empty($inicia)) {
            return response()->json(['error' => 'Invalid input'], 400);
        }

        // Obtener la competencia de la base de datos
        $competencia = competencia::find($id_competencia);
        // Verificar si la competencia es de kata
        if ($competencia->categoria->disciplina == 'Kumite') {
            return response()->json(['error' => 'No se puede crear un combate de kata en una competencia de kumite'], 400);
        }

        // Crear el combate en la base de datos
        $combate = new Combate();
        $combate->id_tatami = $id_tatami;
        $combate->id_ronda = $id_ronda;
        $combate->id_competencia = $id_competencia;

        $ahora = Carbon::now();
        $inicia = Carbon::createFromFormat('Y-m-d H:i:s', $inicia, 'America/Mexico_City');
        if ($inicia->greaterThan($ahora)) {
            $combate->estado = 'por comenzar';
        } else {
            $combate->estado = 'finalizado';
        }

        $combate->inicia = $inicia;
        if ($ganador) {
            $combate->ganador = $ganador;
        }
        $combate->save();

        return $combate;
    }

    public static function EmparejarKata($id_combate, $id_participante1, $id_participante2)
    {
        // Obtener todos los combates de la base de datos
        $combate = Combate::where('id', $id_combate)->first();
        $modalidad = $combate->competencia->categoria->modalidad;

        // Verificar si el combate existe   
        if (!$combate) {
            return response()->json(['error' => 'Combate no encontrado'], 404);
        }
        if ($combate->competencia->categoria->disciplina == 'Kumite') {
            return response()->json(['error' => 'No se puede crear un combate de kata en una competencia de kumite'], 400);
        }

        if ($modalidad == 'individual') {
            $participante1 = participantes::find($id_participante1);
            $participante2 = participantes::find($id_participante2);
            // Si la modalidad es individual, asignar los participantes al combate
            if ($participante1->equiposkata->where('id_competencia', $combate->id_competencia)->isNotEmpty()) {
                $equipoKata1 = $participante1->equiposkata->where('id_competencia', $combate->id_competencia)->first();
            } else {
                $equipoKata1 = EquipoKata::create([
                    'nombre' => $participante1->primer_nombre . ' ' . $participante1->primer_apellido . ' ' . $participante1->dojo,
                    'id_competencia' => $combate->id_competencia,
                    'genero' => $participante1->genero,
                ]);
                $equipoKata1->participantes()->attach($id_participante1);
            }
            if ($participante2->equiposkata->where('id_competencia', $combate->id_competencia)->isNotEmpty()) {
                $equipoKata2 = $participante2->equiposkata->where('id_competencia', $combate->id_competencia)->first();
            } else {
                $equipoKata2 = EquipoKata::create([
                    'nombre' => $participante2->primer_nombre . ' ' . $participante2->primer_apellido . ' ' . $participante2->dojo,
                    'id_competencia' => $combate->id_competencia,
                    'genero' => $participante2->genero,
                ]);
                $equipoKata2->participantes()->attach($id_participante2);
            }
        } else {
            // Si la modalidad es por equipos, asignar los equipos al combate
            $equipoKata1 = EquipoKata::find($id_participante1);
            $equipoKata2 = EquipoKata::find($id_participante2);
        }

        $combate->equiposkata()->sync([$equipoKata1->id, $equipoKata2->id]);
        presentacionkata::create([
            'kata'=>fake()->randomElement([
                '000 Bassai-Dai',
                '001 Jion',
                '002 Kanku-Dai',
                '003 Enpi',
                '004 Sochin',
                '005 Unsu',
                '006 Gojushih-Sho',
                '007 Gojushiho-Dai',
                '008 Nijushiho',
                '009 Jitte',
                '010 Hangetsu',
                '011 Gankaku',
                '012 Chinte',
                '013 Meikyo',
                '014 Wankan',
                '015 Ji-in',
                '016 Bassai-Sho',
                '017 Kanku-Sho',
                '018 Wanshu',
                '019 Rohai'
            ]),
            'bunkai'=>0,
            'color'=>'rojo',
            'id_combate'=>$combate->id,
            'id_equipokata'=>$equipoKata1->id
        ]);
        presentacionkata::create([
            'kata'=>fake()->randomElement([
                '000 Bassai-Dai',
                '001 Jion',
                '002 Kanku-Dai',
                '003 Enpi',
                '004 Sochin',
                '005 Unsu',
                '006 Gojushih-Sho',
                '007 Gojushiho-Dai',
                '008 Nijushiho',
                '009 Jitte',
                '010 Hangetsu',
                '011 Gankaku',
                '012 Chinte',
                '013 Meikyo',
                '014 Wankan',
                '015 Ji-in',
                '016 Bassai-Sho',
                '017 Kanku-Sho',
                '018 Wanshu',
                '019 Rohai'
            ]),
            'bunkai'=>0,
            'color'=>'azul',
            'id_combate'=>$combate->id,
            'id_equipokata'=>$equipoKata2->id
        ]);
        return $combate->equiposkata;
    }

    public static function GanadorKata($id_combate, $id_ganador)
    {

        // Obtener el combate de la base de datos
        $combate = Combate::find($id_combate);
        // Verificar si el combate existe
        if (!$combate) {
            return response()->json(['error' => 'Combate no encontrado'], 404);
        }


        // Verificar si el combate es de kata
        if ($combate->competencia->categoria->disciplina == 'Kumite') {
            return response()->json(['error' => 'No se puede crear un combate de kata en una competencia de kumite'], 400);
        }

        // Actualizar el ganador del combate
        $combate->ganador = $id_ganador;
        $combate->estado = 'finalizado';
        $combate->save();

        return $combate->ganador;
    }

    public static function CrearJueces($id_combate, $num_jueces = 7)
    {
        // Obtener el combate de la base de datos
        $combate = Combate::find($id_combate);

        // Verificar si el combate es de kata
        if ($combate->competencia->categoria->disciplina == 'Kumite') {
            return response()->json(['error' => 'No se puede crear un combate de kata en una competencia de kumite'], 400);
        }

        if (Puntokata::where('id_combate', $combate->id)->exists()) {
            return response()->json(['error' => 'Ya se han creado los jueces para este combate'], 400);
        }

        // Verificar si el combate existe
        if (!$combate) {
            return response()->json(['error' => 'Combate no encontrado'], 404);
        }

        // Asignar el juez al combate

        foreach ($combate->equiposkata as $equipoKata) {
            $puntokata = Puntokata::create([
                'id_combate' => $combate->id,
                'id_equipokata' => $equipoKata->id,
            ]);
            foreach (range(1, $num_jueces) as $i) {
                PuntoJuez::create([
                    'id_puntoskata' => $puntokata->id,
                    'juez' => $i,
                    'sesgo'=>True
                ]);
            }
        }

        return $combate->equiposkata()->with(['puntokata.puntosjuezkata'])->get();
    }

    // Métodos para usar el sistema de kumite
    public static function gruposkata($nombre, $numero, $participantes, $id_competencia, $id_tatami,$fecha=null)
    {   
        if($fecha==null){
            $fecha = Carbon::now();
        }
        // Validar los parámetros de entrada
        $competencia = competencia::find($id_competencia);
        $grupo = Grupo::create([
            'nombre' => $nombre,
            'numero' => $numero,
            'id_competencia' => $id_competencia,
        ]);
        $grup=array();
        if ($competencia->categoria->modalidad == 'equipos') {
            $grupo->equiposkata()->sync($participantes);
        }else {
            
            foreach ($participantes as $participante) {
                $participante1 = participantes::find($participante);
                if ($participante1->equiposkata->where('id_competencia', $id_competencia)->isNotEmpty()) {
                    $equipoKata1 = $participante1->equiposkata->where('id_competencia', $id_competencia)->first();
                } else {
                    $equipoKata1 = EquipoKata::create([
                        'nombre' => $participante1->primer_nombre . ' ' . $participante1->primer_apellido . ' ' . $participante1->dojo,
                        'id_competencia' => $id_competencia,
                        'genero' => $participante1->genero,
                    ]);
                    $equipoKata1->participantes()->attach( $participante1->id);
                }
                $grup[] = $equipoKata1->id;
                
            }
            $grupo->equiposkata()->sync($grup);
        }
        
        $ronda = array();
        foreach (range(1, 3) as $i) {
            $ronda[$i] = Ronda::create([
                'nombre' => 'Ronda ' . $i,
                'tipo' => 'grupo',
                'orden' => $i,
                'id_grupo' => $grupo->id,
            ]);
        }
        $numParticipantes = count($participantes);
        $combates = [];

        for ($i = 0; $i < $numParticipantes - 1; $i++) {
            for ($j = $i + 1; $j < $numParticipantes; $j++) {
                if ($i === 0) {
                    $combates[] = [
                        'id_ronda' => $ronda[$j]->id,
                        'id_participante1' => $participantes[$i],
                        'id_participante2' => $participantes[$j],
                    ];
                } else if ($i === 1) {
                    $combates[] = [
                        'id_ronda' => $ronda[$i + 4 - $j]->id,
                        'id_participante1' => $participantes[$j],
                        'id_participante2' => $participantes[$i],
                    ];
                } else if ($i === 2) {
                    $combates[] = [
                        'id_ronda' => $ronda[$i - 1]->id,
                        'id_participante1' => $participantes[$i],
                        'id_participante2' => $participantes[$j],
                    ];
                }
            }
        }
        foreach ($combates as $combate) {
            $kata = self::CreateKata(
                $id_tatami,
                $combate['id_ronda'],
                $id_competencia,
                $fecha
            );
            self::EmparejarKata($kata->id,$combate['id_participante1'], $combate['id_participante2']);
            self::CrearJueces($kata->id);
            
        }
        return $grupo->rondas()->with(['combates.equiposkata'])->get();
    }


    // Método para crear un combate de kumite
    // Este método crea un combate de kumite y lo guarda en la base de datos

    public static function CreateKumite($id_tatami, $id_ronda, $id_competencia, $inicia, $ganador = null)
    {
        // Validar los parámetros de entrada
        if (empty($id_tatami) || empty($id_ronda) || empty($id_competencia) || empty($inicia)) {
            return response()->json(['error' => 'Invalid input'], 400);
        }
        // Obtener la competencia de la base de datos
        $competencia = competencia::find($id_competencia);
        // Verificar si la competencia es de kumite 
        if ($competencia->categoria->disciplina == 'Kata') {
            return response()->json(['error' => 'No se puede crear un combate de kumite en una competencia de kata'], 400);
        }

        // Crear el combate en la base de datos
        $combate = new Combate();
        $combate->id_tatami = $id_tatami;
        $combate->id_ronda = $id_ronda;
        $combate->id_competencia = $id_competencia;

        $ahora = Carbon::now();
        $inicia = Carbon::createFromFormat('Y-m-d H:i:s', $inicia, 'America/Mexico_City');
        if ($inicia->greaterThan($ahora)) {
            $combate->estado = 'por comenzar';
        } else {
            $combate->estado = 'finalizado';
        }

        $combate->inicia = $inicia;
        if ($ganador) {
            $combate->ganador = $ganador;
        }
        $combate->save();

        return $combate;
    }

    public static function GanadorKumite($id_combate, $id_ganador)
    {
        // Obtener el combate de la base de datos
        $combate = Combate::find($id_combate);

        // Verificar si el combate existe
        if (!$combate) {
            return response()->json(['error' => 'Combate no encontrado'], 404);
        }

        // Verificar si el combate es de kumite
        if ($combate->competencia->categoria->disciplina == 'Kata') {
            return response()->json(['error' => 'No se puede crear un combate de kumite en una competencia de kata'], 400);
        }
        // Actualizar el ganador del combate
        $combate->ganador = $id_ganador;
        $combate->estado = 'finalizado';
        $combate->save();

        return $combate->ganador;
    }

    public static function gruposkumite($nombre, $numero, $participantes, $id_competencia, $id_tatami,$fecha=null)
    {   
        if($fecha==null){
            $fecha = Carbon::now();
        }
        $grupo = Grupo::create([
            'nombre' => $nombre,
            'numero' => $numero,
            'id_competencia' => $id_competencia,
        ]);

        $grupo->participantes()->sync($participantes);
        $ronda = array();
        foreach (range(1, 3) as $i) {
            $ronda[$i] = Ronda::create([
                'nombre' => 'Ronda ' . $i,
                'tipo' => 'grupo',
                'orden' => $i,
                'id_grupo' => $grupo->id,
            ]);
        }
        $numParticipantes = count($participantes);
        $combates = [];

        for ($i = 0; $i < $numParticipantes - 1; $i++) {
            for ($j = $i + 1; $j < $numParticipantes; $j++) {
                if ($i === 0) {
                    $combates[] = [
                        'id_ronda' => $ronda[$j]->id,
                        'id_participante1' => $participantes[$i],
                        'id_participante2' => $participantes[$j],
                    ];
                } else if ($i === 1) {
                    $combates[] = [
                        'id_ronda' => $ronda[$i + 4 - $j]->id,
                        'id_participante1' => $participantes[$j],
                        'id_participante2' => $participantes[$i],
                    ];
                } else if ($i === 2) {
                    $combates[] = [
                        'id_ronda' => $ronda[$i - 1]->id,
                        'id_participante1' => $participantes[$i],
                        'id_participante2' => $participantes[$j],
                    ];
                }
            }
        }
        foreach ($combates as $combate) {
            $kumite = self::CreateKumite(
                $id_tatami,
                $combate['id_ronda'],
                $id_competencia,
                $fecha
            );
            $kumite->participantes()->sync([$combate['id_participante1'], $combate['id_participante2']]);
            $kumite->puntokumite()->create([
                'id_participante' => $combate['id_participante1'],
                'color' => 'rojo',
                'senshu' => 0,
            ]);
            $kumite->puntokumite()->create([
                'id_participante' => $combate['id_participante2'],
                'color' => 'azul',
                'senshu' => 0,
            ]);
        }
        return $grupo->rondas()->with(['combates.participantes'])->get();
    }

    public static function  sortear($allParticipants)
    {
        if (count($allParticipants) !== 32) {
            return  response()->json("Se requieren exactamente 32 participantes.");
        }
    
        // Mezclar aleatoriamente los participantes
        shuffle($allParticipants);
    
        // Crear los 8 grupos
        $grupos = array_chunk($allParticipants, 4);
    
        return $grupos;
       
    }
}
