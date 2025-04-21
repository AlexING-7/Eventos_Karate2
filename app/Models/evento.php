<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class evento extends Model
{   
    protected $fillable = ['nombre','fecha','localizacion','descripcion'];

    protected $table='eventos';

    public function competencias():HasMany{
        return $this->hasMany(competencia::class,'id_evento');
    }

    public function categoria():BelongsToMany{

        return $this->belongsToMany(categoria::class,'competencias','id_evento','id_categoria')->withPivot('id');;
    }
    //https://laravel.com/docs/12.x/eloquent-relationships
}
