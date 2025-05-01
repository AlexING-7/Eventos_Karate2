<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\participantes>
 */
class participantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'primer_nombre'=> fake()->firstName(),
        'segundo_nombre'=> fake()->firstName(),
        'primer_apellido'=> fake()->lastName(),
        'segundo_apellido'=> fake()->lastName(),
        'fecha_nacimiento' => fake()->date(),
        'genero'=>fake()->randomElement(['Masculino', 'Femenino']),
        'peso'=> fake()->randomFloat(2, 40, 100),
        'estatura'=> fake()->randomFloat(2, 1.5, 2.0),
        'dojo'=> fake()->randomElement(['Dojo Alex', 'Dojo Febe', 'Dojo Ashley', 'Dojo Williams', 'Dojo Shenn', 'Dojo Caraqueño']),
        'cinturon'=> fake()->randomElement(['Blanco', 'Amarillo', 'Naranja', 'Verde', 'Azul',]),
        'foto'=> fake()->imageUrl(640, 480, 'people', true, 'Fabrica', true),
        ];
    }
}
