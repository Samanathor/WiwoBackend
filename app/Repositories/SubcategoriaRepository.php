<?php

namespace App\Repositories;

use App\Models\Subcategoria;
use App\Repositories\BaseRepository;

/**
 * Class SubcategoriaRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:35 pm UTC
*/

class SubcategoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'orden',
        'categoria_id',
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
        return Subcategoria::class;
    }
}
