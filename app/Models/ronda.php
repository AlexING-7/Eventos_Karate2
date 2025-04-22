<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ronda extends Model
{
    protected $table='rondas';
    protected $fillable = ['nombre','tipo','orden','id_grupo'];
}
