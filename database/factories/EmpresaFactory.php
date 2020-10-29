<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        'identificacion' => $this->faker->word,
        'ciudad_id' => $this->faker->randomDigitNotNull,
        'direccion' => $this->faker->word,
        'email' => $this->faker->word,
        'user_id' => $this->faker->word,
        'facebook_url' => $this->faker->word,
        'instagram_url' => $this->faker->word,
        'video' => $this->faker->word,
        'categoria_id' => $this->faker->randomDigitNotNull,
        'beneficios' => $this->faker->text,
        'tamano' => $this->faker->word,
        'tipos_contratacion' => $this->faker->word,
        'frecuencia_contrato' => $this->faker->word,
        'activo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
