<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tatami extends Model
{
   protected $table = 'tatamis';
   protected $fillable = [
       'nombre',
       ' id_evento ',
       'estado',
   ];
}
