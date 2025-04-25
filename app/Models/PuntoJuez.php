<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PuntoJuez extends Model
{
    protected $table = 'puntosjuezkata'; // Nombre de la tabla en la base de datos
    protected $fillable = ['id_puntoskata', 'juez', 'puntaje'];

    public function puntokata() : BelongsTo
    {
        return $this->belongsTo(Puntokata::class, 'id_puntoskata');
    }
}
