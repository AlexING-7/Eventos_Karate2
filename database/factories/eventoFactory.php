<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\evento>
 */
class eventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

      
    public function definition(): array
    {
        $carpetaImagenes = public_path('image/factory/banners'); // Ajusta la ruta según tu estructura
        $imagenes = [];

        // Verificar si la carpeta existe
        if (is_dir($carpetaImagenes)) {
            // Obtener todos los archivos de la carpeta
            $archivos = scandir($carpetaImagenes);

            // Filtrar solo archivos válidos (excluyendo '.' y '..')
            $imagenes = array_filter($archivos, function ($archivo) use ($carpetaImagenes) {
                return is_file($carpetaImagenes . DIRECTORY_SEPARATOR . $archivo);
            });

            // Agregar el prefijo '/factory/banners' a cada archivo
            $imagenes = array_map(function ($archivo) {
                return '/factory/banners/' . $archivo;
            }, $imagenes);
        }
        return [
            'nombre' => fake()->company(),
            'descripcion' => fake()->text(),
            'fecha' => fake()->dateTime(),
            'localizacion' => fake()->address(),
            'imagen' => fake()->randomElement($imagenes),
        ];
    }
}
