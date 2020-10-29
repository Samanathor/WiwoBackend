<?php

namespace Database\Factories;

use App\Models\Perfil;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerfilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Perfil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sexo' => $this->faker->randomDigitNotNull,
        'nivel_estudios' => $this->faker->randomDigitNotNull,
        'profesion' => $this->faker->word,
        'salario_minimo' => $this->faker->word,
        'salario_maximo' => $this->faker->word,
        'bio' => $this->faker->text,
        'referal_user_id' => $this->faker->word,
        'verificacion_telefonica' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
