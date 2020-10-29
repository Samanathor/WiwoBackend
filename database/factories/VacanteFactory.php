<?php

namespace Database\Factories;

use App\Models\Vacante;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_cargo' => $this->faker->word,
        'descripcion' => $this->faker->text,
        'tipo_jornada' => $this->faker->randomDigitNotNull,
        'fecha_incorporacion' => $this->faker->word,
        'nivel_experiencia' => $this->faker->randomDigitNotNull,
        'subcategoria_id' => $this->faker->randomDigitNotNull,
        'salario_inicial' => $this->faker->word,
        'salario_final' => $this->faker->word,
        'ciudad_id' => $this->faker->randomDigitNotNull,
        'terminos_condiciones' => $this->faker->word,
        'tipo_vacante' => $this->faker->randomDigitNotNull,
        'creador_id' => $this->faker->word,
        'estado_vacante' => $this->faker->randomDigitNotNull,
        'activo' => $this->faker->word,
        'empresa_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
