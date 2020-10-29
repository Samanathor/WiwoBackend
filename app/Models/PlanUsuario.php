<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PlanUsuario",
 *      required={"plan_id", "user_id", "fecha_finalizacion", "activo"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="plan_id",
 *          description="plan_id",
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
 *          property="fecha_finalizacion",
 *          description="fecha_finalizacion",
 *          type="string",
 *          format="date"
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
class PlanUsuario extends Model
{
    use SoftDeletes;

    public $table = 'planes_usuario';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'plan_id',
        'user_id',
        'fecha_finalizacion',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'plan_id' => 'integer',
        'user_id' => 'integer',
        'fecha_finalizacion' => 'date',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'plan_id' => 'required',
        'user_id' => 'required',
        'fecha_finalizacion' => 'required',
        'activo' => 'required'
    ];

    
}
