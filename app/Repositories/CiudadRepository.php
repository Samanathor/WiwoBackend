<?php

namespace App\Repositories;

use App\Models\Ciudad;
use App\Repositories\BaseRepository;

/**
 * Class CiudadRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:41 pm UTC
*/

class CiudadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
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
        return Ciudad::class;
    }
}
