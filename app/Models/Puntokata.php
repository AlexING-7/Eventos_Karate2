<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Puntokata extends Model
{
    protected $table = 'puntoskata'; // Nombre de la tabla en la base de datos
    protected $fillable = ['id_combate', 'id_equipokata', 'total'];
    
    public function combate() : BelongsTo
    {
        return $this->belongsTo(Combate::class, 'id_combate');
    }
    
    public function equipokata() : BelongsTo
    {
        return $this->belongsTo(EquipoKata::class, 'id_equipokata');
    }
    
    public function puntosjuezkata() : HasMany
    {
        return $this->hasMany(Puntojuez::class, 'id_puntoskata');
    }
    
}
