<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class competencia extends Model
{
    protected $fillable = ['id_evento','id_categoria','disciplina'];
    protected $table='competencias';

    public function evento():BelongsTo{
        return $this->belongsTo(evento::class,'id_evento');
    }
    public function categoria():BelongsTo{
        return $this->belongsTo(categoria::class,'id_categoria');
    }
    //https://laravel.com/docs/12.x/eloquent-relationships

    public function combates(){
        return $this->hasMany(Combate::class,'id_competencia');
    }

    public function grupos(){
        return $this->hasMany(Grupo::class,'id_competencia');
    }

    public function participantes(): BelongsToMany{
        return $this->belongsToMany(participantes::class,'competencias_participantes','id_competencia','id_participante');
    }
}
