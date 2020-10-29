<?php

namespace App\Repositories;

use App\Models\Postulacion;
use App\Repositories\BaseRepository;

/**
 * Class PostulacionRepository
 * @package App\Repositories
 * @version October 19, 2020, 8:00 pm UTC
*/

class PostulacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'postulante_id',
        'vacante_id',
        'respuesta_postulante',
        'respuesta_empleador',
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
        return Postulacion::class;
    }
}
