<?php

namespace App\Repositories;

use App\Models\Configuracion;
use App\Repositories\BaseRepository;

/**
 * Class ConfiguracionRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:45 pm UTC
*/

class ConfiguracionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'notificaciones',
        'visible'
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
        return Configuracion::class;
    }
}
