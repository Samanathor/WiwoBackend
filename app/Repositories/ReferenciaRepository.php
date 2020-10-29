<?php

namespace App\Repositories;

use App\Models\Referencia;
use App\Repositories\BaseRepository;

/**
 * Class ReferenciaRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:42 pm UTC
*/

class ReferenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nombre',
        'telefono_contacto',
        'relacion'
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
        return Referencia::class;
    }
}
