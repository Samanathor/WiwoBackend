<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Postulacion",
 *      required={"postulante_id", "vacante_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="postulante_id",
 *          description="postulante_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="vacante_id",
 *          description="vacante_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="respuesta_postulante",
 *          description="respuesta_postulante",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="respuesta_empleador",
 *          description="respuesta_empleador",
 *          type="boolean"
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
class Postulacion extends Model
{
    use SoftDeletes;

    public $table = 'postulaciones';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'postulante_id',
        'vacante_id',
        'respuesta_postulante',
        'respuesta_empleador',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'postulante_id' => 'integer',
        'vacante_id' => 'integer',
        'respuesta_postulante' => 'boolean',
        'respuesta_empleador' => 'boolean',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'postulante_id' => 'required',
        'vacante_id' => 'required'
    ];

    
}
