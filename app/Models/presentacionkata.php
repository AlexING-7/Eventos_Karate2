<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class presentacionkata extends Model
{
    protected $table = 'presentacioneskata';
    protected $fillable = ['kata', 'bunkai', 'color', 'id_combate', 'tiempo', 'id_equipokata'];
}
