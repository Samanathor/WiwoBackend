<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Pago",
 *      required={"user_plan_id", "value", "fecha_realizacion"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_plan_id",
 *          description="user_plan_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="value",
 *          description="value",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tipo",
 *          description="tipo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fecha_realizacion",
 *          description="fecha_realizacion",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="payment_id",
 *          description="payment_id",
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
class Pago extends Model
{
    use SoftDeletes;

    public $table = 'pagos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_plan_id',
        'value',
        'tipo',
        'fecha_realizacion',
        'payment_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_plan_id' => 'integer',
        'value' => 'integer',
        'tipo' => 'string',
        'fecha_realizacion' => 'date',
        'payment_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_plan_id' => 'required',
        'value' => 'required',
        'fecha_realizacion' => 'required'
    ];

    
}
