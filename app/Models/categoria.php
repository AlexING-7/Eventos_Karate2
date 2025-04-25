<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class categoria extends Model
{
    protected $fillable = ['nombre','edad_min','edad_max','genero','peso','duracion'];
    protected $table='categorias';

    public function competencias():HasMany{
        return $this->hasMany(competencia::class,'id_categoria');
    }

    public function eventos():BelongsToMany{

        return $this->belongsToMany(evento::class,'competencias','id_categoria','id_evento')->withPivot('id');
    }

    //https://laravel.com/docs/12.x/eloquent-relationships
}
