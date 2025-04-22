<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tatami extends Model
{
    protected $fillable = ['nombre','estado','id_evento'];
    protected $table='tatamis';
}
