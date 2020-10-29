<?php

namespace App\Repositories;

use App\Models\Denuncia;
use App\Repositories\BaseRepository;

/**
 * Class DenunciaRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:46 pm UTC
*/

class DenunciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'reporter_id',
        'fecha',
        'tipo_reporte',
        'descripcion'
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
        return Denuncia::class;
    }
}
