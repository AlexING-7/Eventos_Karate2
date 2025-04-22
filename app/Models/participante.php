<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class participante extends Model
{
    protected $table = 'participantes';
    protected $fillable = ['primer_nombre','segundo_nombre', 'primer_apellido','segundo_apellido', 'fecha_nacimiento', 'peso', 'genero', 'estatura', 'dojo','cinturon'];

    
}
