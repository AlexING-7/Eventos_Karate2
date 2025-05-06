<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class grupoParticipantes extends Model // Nombre en PascalCase
{
    protected $table = 'grupos_participantes'; // Manteniendo tu nombre de tabla personalizado

    protected $fillable = [
        'id_grupo',
        'id_participante',
        'posicion' // Asegúrate de agregar este campo
    ];

    /**
     * Relación con el modelo Grupo
     */
    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }
    /**
     * Relación con el modelo Participante
     */
    public function participante(): BelongsTo
    {
        return $this->belongsTo(participantes::class, 'id_participante'); 
    }
}