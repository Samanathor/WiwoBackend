<?php

namespace Database\Factories;

use App\Models\Postulacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostulacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Postulacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'postulante_id' => $this->faker->word,
        'vacante_id' => $this->faker->randomDigitNotNull,
        'respuesta_postulante' => $this->faker->word,
        'respuesta_empleador' => $this->faker->word,
        'activo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
