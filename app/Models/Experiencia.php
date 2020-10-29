<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Experiencia",
 *      required={"user_id", "fecha_ingreso", "activo"},
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
 *          property="empresa",
 *          description="empresa",
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
 *          property="descripcion_cargo",
 *          description="descripcion_cargo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
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
class Experiencia extends Model
{
    use SoftDeletes;

    public $table = 'experiencias';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'empresa',
        'fecha_ingreso',
        'fecha_fin',
        'descripcion_cargo',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'empresa' => 'string',
        'fecha_ingreso' => 'date',
        'fecha_fin' => 'date',
        'descripcion_cargo' => 'string',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'fecha_ingreso' => 'required',
        'activo' => 'required'
    ];

    
}
