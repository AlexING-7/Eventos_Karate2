<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EquipoKata extends Model
{
    protected $table = 'equiposkata';
    protected $fillable=['nombre','id_competencia','genero']; 
    // Nombre de la tabla en la base de datos


    public function participantes():BelongsToMany
    {
        return $this->belongsToMany(participantes::class, 'equiposkata_participantes', 'id_equipokata','id_participante' );
    }

    // Relación con la tabla de competencias
    public function competencia():BelongsTo
    {
        return $this->belongsTo(competencia::class, 'id_competencia' );
    }

    // Relación con la tabla de grupos
    public function grupos():BelongsToMany
    {
        return $this->belongsToMany(Grupo::class, 'grupos_equiposkata', 'id_equipokata','id_grupo' );
    }

    public function puntokata():HasMany
    {
        return $this->hasMany(Puntokata::class, 'id_equipokata' );
     }

    public function presentacionkata():HasMany
    {
        return $this->hasMany(presentacionkata::class, 'id_equipokata' );
     }
}
