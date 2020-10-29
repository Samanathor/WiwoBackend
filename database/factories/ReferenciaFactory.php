<?php

namespace Database\Factories;

use App\Models\Referencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Referencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'nombre' => $this->faker->word,
        'telefono_contacto' => $this->faker->word,
        'relacion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
