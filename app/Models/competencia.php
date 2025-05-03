<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function grupos(): HasMany{
        return $this->hasMany(related: Grupo::class,foreignKey:'id_competencia');
    }
}
