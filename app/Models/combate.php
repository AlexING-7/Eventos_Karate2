<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class combate extends Model
{
    protected $fillable = ['id_tatami','id_ronda','id_competencia','estado','inicia','ganador'];
    protected $table='combates';

    public function competencia():BelongsTo{
        return $this->belongsTo(competencia::class,'id_competencia');
    }

    public function ronda():BelongsTo{
        return $this->belongsTo(ronda::class,'id_ronda');
    }

    public function tatami():BelongsTo{
        return $this->belongsTo(tatami::class,'id_tatami');
    }

    public function equipokata():BelongsToMany{

        return $this->belongsToMany(equipokata::class,'combateskata_equiposkata','id_combate','id_equipokata')->withPivot('id');
    }
}
