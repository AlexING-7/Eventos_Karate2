<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FaltaKumite extends Model
{
    protected $table = 'faltas_kumite';

    protected $fillable = [
        'id_combate',
        'id_participante',
        'tipo_falta',
        'motivo',
        'tiempo'
    ];

    public function combate(): BelongsTo
    {
        return $this->belongsTo(Combate::class, 'id_combate');
    }

    public function participante(): BelongsTo
    {
        return $this->belongsTo(participantes::class, 'id_participante');
    }
}