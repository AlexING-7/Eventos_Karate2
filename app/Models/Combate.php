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
        return $this->belongsTo(competencia::class, 'id_competencia');
    }

    public function ganador()
    {
        return $this->belongsTo(participantes::class, 'ganador');
    }

    public function participantes()
    {
        return $this->belongsToMany(participantes::class, 'combates_participantes', 'id_combate', 'id_participante')
                ->withTimestamps();
    }

    public function equiposkata()
    {
        return $this->belongsToMany(EquipoKata::class, 'combateskata_equiposkata', 'id_combate', 'id_equipokata')
                ->withTimestamps();
    }

    public function puntokata()
    {
        return $this->hasMany(Puntokata::class, 'id_combate');
    }
}