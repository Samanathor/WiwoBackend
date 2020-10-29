<?php

namespace App\Http\Requests\API;

use App\Models\Configuracion;
use InfyOm\Generator\Request\APIRequest;

class UpdateConfiguracionAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Configuracion::$rules;
        
        return $rules;
    }
}
