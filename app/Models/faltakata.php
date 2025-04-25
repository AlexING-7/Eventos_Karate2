<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class faltakata extends Model
{
    protected $table = 'faltaskata';
    protected $fillable = ['tipo', 'descripcion', 'deduccion', 'id_puntosjuezkata'];
}
