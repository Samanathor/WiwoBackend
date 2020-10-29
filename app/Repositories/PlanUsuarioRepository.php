<?php

namespace App\Repositories;

use App\Models\PlanUsuario;
use App\Repositories\BaseRepository;

/**
 * Class PlanUsuarioRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:49 pm UTC
*/

class PlanUsuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'plan_id',
        'user_id',
        'fecha_finalizacion',
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
        return PlanUsuario::class;
    }
}
