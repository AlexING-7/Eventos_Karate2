<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class faltas_kumite extends Model
{
    protected $table = 'faltas_kumite'; 
    protected $fillable=['id_combate', 'id_participante', 'tipo_falta', 'tiempo_falta', 'juez_falta'];
}
