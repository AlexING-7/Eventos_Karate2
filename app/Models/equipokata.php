<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class equipokata extends Model
{
    protected $fillable = ['nombre','id_evento'];
    protected $table='equiposkata';

    public function participantes():BelongsToMany{
        return $this->belongsToMany(participante::class,'equiposkata_participantes','id_equiposkata','id_participantes')->withPivot('id');
    }

    public function presentacionkata():HasMany{
        return $this->hasMany(presentacionkata::class,'id_equipokata');
    } 
}
