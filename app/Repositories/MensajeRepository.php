<?php

namespace App\Repositories;

use App\Models\Mensaje;
use App\Repositories\BaseRepository;

/**
 * Class MensajeRepository
 * @package App\Repositories
 * @version October 19, 2020, 8:00 pm UTC
*/

class MensajeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'postulacion_id',
        'user_id',
        'mensaje'
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
        return Mensaje::class;
    }
}
