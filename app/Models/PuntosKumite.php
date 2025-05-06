<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PuntosKumite extends Model
{
    protected $table = 'puntoskumite';

    protected $fillable = [
        'id_combate',
        'id_participante',
        'color',
        'senshu',
        'yuko',
        'waza_ari',
        'ippon'
    ];

    public function combate(): BelongsTo
    {
        return $this->belongsTo(Combate::class, 'id_combate');
    }

    public function participante(): BelongsTo
    {
        return $this->belongsTo(participantes::class, 'id_participante');
    }

    // Accesor para el total de puntos
    public function getTotalAttribute(): int
    {
        return ($this->yuko * 1) + ($this->waza_ari * 2) + ($this->ippon * 3);
    }
}