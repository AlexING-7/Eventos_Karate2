<?php

// app/Models/Ronda.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ronda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
        'orden',
        'id_grupo'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function combates()
    {
        return $this->hasMany(Combate::class, 'id_ronda');
    }
}