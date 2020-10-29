<?php

namespace Database\Factories;

use App\Models\Experiencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experiencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'empresa' => $this->faker->word,
        'fecha_ingreso' => $this->faker->word,
        'fecha_fin' => $this->faker->word,
        'descripcion_cargo' => $this->faker->text,
        'activo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
