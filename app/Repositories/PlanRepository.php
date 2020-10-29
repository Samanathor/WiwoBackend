<?php

namespace App\Repositories;

use App\Models\Plan;
use App\Repositories\BaseRepository;

/**
 * Class PlanRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:47 pm UTC
*/

class PlanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'precio',
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
        return Plan::class;
    }
}
