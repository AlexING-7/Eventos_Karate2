<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class puntoskumite extends Model
{
    protected $table = 'puntoskumite'; // Nombre de la tabla en la base de datos
    protected $fillable = ['id_combate', 'id_participante', 'senshu','yuko','waza_ari','ippon'];
    public function combate() : BelongsTo
    {
        return $this->belongsTo(Combate::class, 'id_combate');
    }
    
}
