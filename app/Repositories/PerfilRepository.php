<?php

namespace App\Repositories;

use App\Models\Perfil;
use App\Repositories\BaseRepository;

/**
 * Class PerfilRepository
 * @package App\Repositories
 * @version October 19, 2020, 8:03 pm UTC
*/

class PerfilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sexo',
        'nivel_estudios',
        'profesion',
        'salario_minimo',
        'salario_maximo',
        'bio',
        'referal_user_id',
        'verificacion_telefonica'
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
        return Perfil::class;
    }
}
