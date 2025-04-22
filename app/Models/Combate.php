<?php

// app/Models/Combate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Combate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tatami',
        'id_ronda',
        'id_competencia',
        'estado',
        'inicia',
        'ganador'
    ];

    public function tatami()
    {
        return $this->belongsTo(Tatami::class, 'id_tatami');
    }

    public function ronda()
    {
        return $this->belongsTo(Ronda::class, 'id_ronda');
    }

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'id_competencia');
    }

    public function ganador()
    {
        return $this->belongsTo(Participante::class, 'ganador');
    }

    public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'combates_participantes', 'id_combate', 'id_participante')
            ->withPivot('color')
            ->withTimestamps();
    }
}