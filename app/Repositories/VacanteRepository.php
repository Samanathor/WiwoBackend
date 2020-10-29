<?php

namespace App\Repositories;

use App\Models\Vacante;
use App\Repositories\BaseRepository;

/**
 * Class VacanteRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:59 pm UTC
*/

class VacanteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_cargo',
        'descripcion',
        'tipo_jornada',
        'fecha_incorporacion',
        'nivel_experiencia',
        'subcategoria_id',
        'salario_inicial',
        'salario_final',
        'ciudad_id',
        'terminos_condiciones',
        'tipo_vacante',
        'creador_id',
        'estado_vacante',
        'activo',
        'empresa_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vacante::class;
    }
}
