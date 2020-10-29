<?php

namespace App\Repositories;

use App\Models\Favorito;
use App\Repositories\BaseRepository;

/**
 * Class FavoritoRepository
 * @package App\Repositories
 * @version October 19, 2020, 7:46 pm UTC
*/

class FavoritoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'favorite_id',
        'nota'
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
        return Favorito::class;
    }
}
