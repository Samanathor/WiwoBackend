<?php

namespace App\Repositories;

use App\Models\Estudio;
use App\Repositories\BaseRepository;

/**
 * Class EstudioRepository
 * @package App\Repositories
 * @version October 19, 2020, 8:01 pm UTC
*/

class EstudioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'institucion',
        'fecha_ingreso',
        'fecha_fin',
        'tipo_estudio'
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
        return Estudio::class;
    }
}
