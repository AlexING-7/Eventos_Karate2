<?php

// app/Models/Grupo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'numero',
        'id_competencia'
    ];

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'id_competencia');
    }

    public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'grupos_participantes', 'id_grupo', 'id_participante')
            ->withTimestamps();
    }

    public function rondas()
    {
        return $this->hasMany(Ronda::class, 'id_grupo');
    }
}
