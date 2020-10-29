<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Estudio",
 *      required={"user_id", "institucion", "fecha_ingreso"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="institucion",
 *          description="institucion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fecha_ingreso",
 *          description="fecha_ingreso",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="fecha_fin",
 *          description="fecha_fin",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="tipo_estudio",
 *          description="tipo_estudio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Estudio extends Model
{
    use SoftDeletes;

    public $table = 'estudios';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'institucion',
        'fecha_ingreso',
        'fecha_fin',
        'tipo_estudio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'institucion' => 'string',
        'fecha_ingreso' => 'date',
        'fecha_fin' => 'date',
        'tipo_estudio' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'institucion' => 'required',
        'fecha_ingreso' => 'required'
    ];

    
}
