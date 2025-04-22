<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class presentacionkata extends Model
{
   protected $table = 'presentacioneskata';
   protected $fillable = ['id_combate','id_equipokata','kata','bunkai','color'];
}
