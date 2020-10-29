<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Mensaje",
 *      required={"postulacion_id", "user_id", "mensaje"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="postulacion_id",
 *          description="postulacion_id",
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
 *          property="mensaje",
 *          description="mensaje",
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
class Mensaje extends Model
{
    use SoftDeletes;

    public $table = 'mensajes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'postulacion_id',
        'user_id',
        'mensaje'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'postulacion_id' => 'integer',
        'user_id' => 'integer',
        'mensaje' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'postulacion_id' => 'required',
        'user_id' => 'required',
        'mensaje' => 'required'
    ];

    
}
