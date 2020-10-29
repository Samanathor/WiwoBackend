<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Empresa",
 *      required={"nombre", "ciudad_id", "direccion", "user_id", "categoria_id", "tipos_contratacion", "frecuencia_contrato"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="identificacion",
 *          description="identificacion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ciudad_id",
 *          description="ciudad_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="facebook_url",
 *          description="facebook_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="instagram_url",
 *          description="instagram_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="video",
 *          description="video",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="categoria_id",
 *          description="categoria_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="beneficios",
 *          description="beneficios",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tamano",
 *          description="tamano",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipos_contratacion",
 *          description="tipos_contratacion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="frecuencia_contrato",
 *          description="frecuencia_contrato",
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
class Empresa extends Model
{
    use SoftDeletes;

    public $table = 'empresas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'identificacion' => 'string',
        'ciudad_id' => 'integer',
        'direccion' => 'string',
        'email' => 'string',
        'user_id' => 'integer',
        'facebook_url' => 'string',
        'instagram_url' => 'string',
        'video' => 'string',
        'categoria_id' => 'integer',
        'beneficios' => 'string',
        'tamano' => 'string',
        'tipos_contratacion' => 'string',
        'frecuencia_contrato' => 'string',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'ciudad_id' => 'required',
        'direccion' => 'required',
        'user_id' => 'required',
        'categoria_id' => 'required',
        'tipos_contratacion' => 'required',
        'frecuencia_contrato' => 'required'
    ];

    
}
