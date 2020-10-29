<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Perfil",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sexo",
 *          description="sexo",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nivel_estudios",
 *          description="nivel_estudios",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="profesion",
 *          description="profesion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="salario_minimo",
 *          description="salario_minimo",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="salario_maximo",
 *          description="salario_maximo",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="bio",
 *          description="bio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="referal_user_id",
 *          description="referal_user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="verificacion_telefonica",
 *          description="verificacion_telefonica",
 *          type="integer",
 *          format="int32"
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
class Perfil extends Model
{
    use SoftDeletes;

    public $table = 'perfiles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sexo' => 'integer',
        'nivel_estudios' => 'integer',
        'profesion' => 'string',
        'salario_minimo' => 'integer',
        'salario_maximo' => 'integer',
        'bio' => 'string',
        'referal_user_id' => 'integer',
        'verificacion_telefonica' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
