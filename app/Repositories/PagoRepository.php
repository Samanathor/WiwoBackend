<?php

namespace App\Repositories;

use App\Models\Pago;
use App\Repositories\BaseRepository;

/**
 * Class PagoRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:58 pm UTC
*/

class PagoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_plan_id',
        'value',
        'tipo',
        'fecha_realizacion',
        'payment_id'
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
        return Pago::class;
    }
}
