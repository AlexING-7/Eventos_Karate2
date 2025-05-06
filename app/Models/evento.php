<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class evento extends Model
{
    /** @use HasFactory<\Database\Factories\eventoFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'fecha',
        'localizacion',
        'descripcion',
        'imagen'
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];

    protected function imagenUrl(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                // Imagen por defecto si no hay imagen
                if (empty($attributes['imagen'])) {
                    return asset('image/imagen-prueba-eventos.jpeg');
                }

                // Si es una URL completa (por compatibilidad)
                if (filter_var($attributes['imagen'], FILTER_VALIDATE_URL)) {
                    return $attributes['imagen'];
                }

                // URL directa a la imagen en public/image
                return asset('image/' . $attributes['imagen']);
            }
        );
    }
    protected function fechaFormateada(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->fecha->format('d \d\e F, Y')
        );
    }

    public function toLivewireArray()
    {
        return [
            'titulo' => $this->nombre,
            'fecha' => $this->fecha_formateada,
            'ubicacion' => $this->localizacion,
            'imagen' => $this->imagen_url,
            'id' => $this->id
        ];
    }
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'competencias', 'id_evento', 'id_categoria')->withPivot('id');
    }
}
