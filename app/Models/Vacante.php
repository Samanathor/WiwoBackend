<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Vacante",
 *      required={"nombre_cargo", "tipo_jornada", "nivel_experiencia", "subcategoria_id", "salario_inicial", "ciudad_id", "tipo_vacante", "creador_id", "estado_vacante"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre_cargo",
 *          description="nombre_cargo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo_jornada",
 *          description="tipo_jornada",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fecha_incorporacion",
 *          description="fecha_incorporacion",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="nivel_experiencia",
 *          description="nivel_experiencia",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="subcategoria_id",
 *          description="subcategoria_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="salario_inicial",
 *          description="salario_inicial",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="salario_final",
 *          description="salario_final",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ciudad_id",
 *          description="ciudad_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="terminos_condiciones",
 *          description="terminos_condiciones",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="tipo_vacante",
 *          description="tipo_vacante",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="creador_id",
 *          description="creador_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="estado_vacante",
 *          description="estado_vacante",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="empresa_id",
 *          description="empresa_id",
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
class Vacante extends Model
{
    use SoftDeletes;

    public $table = 'vacantes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre_cargo',
        'descripcion',
        'tipo_jornada',
        'fecha_incorporacion',
        'nivel_experiencia',
        'subcategoria_id',
        'salario_inicial',
        'salario_final',
        'ciudad_id',
        'terminos_condiciones',
        'tipo_vacante',
        'creador_id',
        'estado_vacante',
        'activo',
        'empresa_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre_cargo' => 'string',
        'descripcion' => 'string',
        'tipo_jornada' => 'integer',
        'fecha_incorporacion' => 'date',
        'nivel_experiencia' => 'integer',
        'subcategoria_id' => 'integer',
        'salario_inicial' => 'integer',
        'salario_final' => 'integer',
        'ciudad_id' => 'integer',
        'terminos_condiciones' => 'boolean',
        'tipo_vacante' => 'integer',
        'creador_id' => 'integer',
        'estado_vacante' => 'integer',
        'activo' => 'boolean',
        'empresa_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_cargo' => 'required',
        'tipo_jornada' => 'required',
        'nivel_experiencia' => 'required',
        'subcategoria_id' => 'required',
        'salario_inicial' => 'required',
        'ciudad_id' => 'required',
        'tipo_vacante' => 'required',
        'creador_id' => 'required',
        'estado_vacante' => 'required'
    ];

    
}
