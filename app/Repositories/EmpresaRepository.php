<?php

namespace App\Repositories;

use App\Models\Empresa;
use App\Repositories\BaseRepository;

/**
 * Class EmpresaRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:42 pm UTC
*/

class EmpresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'identificacion',
        'ciudad_id',
        'direccion',
        'email',
        'user_id',
        'facebook_url',
        'instagram_url',
        'video',
        'categoria_id',
        'beneficios',
        'tamano',
        'tipos_contratacion',
        'frecuencia_contrato',
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
        return Empresa::class;
    }
}
