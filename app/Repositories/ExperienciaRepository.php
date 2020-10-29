<?php

namespace App\Repositories;

use App\Models\Experiencia;
use App\Repositories\BaseRepository;

/**
 * Class ExperienciaRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:42 pm UTC
*/

class ExperienciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'empresa',
        'fecha_ingreso',
        'fecha_fin',
        'descripcion_cargo',
        'activo'
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
        return Experiencia::class;
    }
}
