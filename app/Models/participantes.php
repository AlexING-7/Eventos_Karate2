<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class participantes extends Model
{
     /** @use HasFactory<\Database\Factories\participantesFactory> */
     use HasFactory, Notifiable;

     /**
      * The attributes that are mass assignable.
      *
      * @var list<string>
      */
    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'genero',
        'peso',
        'estatura',
        'dojo',
        'cinturon',
        'foto' // Added photo field
    ];

    protected $table = 'participantes';

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'peso' => 'decimal:2',
        'estatura' => 'decimal:2',
    ];

    /**
     * Relación con las competencias donde participa
     */
    public function competencias(): BelongsToMany
    {
        return $this->belongsToMany(competencia::class, 'participante_competencia', 'id_participante', 'id_competencia')
            ->withPivot('posicion', 'puntos')
            ->withTimestamps();
    }

    /**
     * Relación con los eventos a través de competencias
     */
    /**
     * Relación con los dojos (si existe modelo dojo)
     */ /**
     * Accesor para nombre completo
     */
    public function getNombreCompletoAttribute(): string
    {
        return trim("{$this->primer_nombre} {$this->segundo_nombre} {$this->primer_apellido} {$this->segundo_apellido}");
    }

    /**
     * Accesor para edad calculada
     */
    public function getEdadAttribute(): int
    {
        return $this->fecha_nacimiento->age;
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            // Verificar si la foto existe en el directorio
            $photoPath = public_path('participantes/' . $this->foto);
            if (file_exists($photoPath)) {
                return asset('participantes/' . $this->foto);
            }
        }

        return asset('image/default-avatar.jpg'); // Imagen por defecto
    }

  
    public function equiposkata(): BelongsToMany       
    {
        return $this->belongsToMany(EquipoKata::class, 'equiposkata_participantes', 'id_participante', 'id_equipokata')
            ->withTimestamps();
    }    
    
    public function combates(): BelongsToMany
    {
        return $this->belongsToMany(Combate::class, 'combates_participantes', 'id_participante', 'id_combate')
            ->withTimestamps();
    }
}
