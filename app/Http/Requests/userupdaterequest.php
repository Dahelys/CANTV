<?php

namespace reporte_red_datos_cantv\Http\Requests;

use reporte_red_datos_cantv\Http\Requests\Request;

class userupdaterequest extends Request
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
         return [
            'user_name' => 'required|max:50',
            'apellido' => 'required|max:50',
            'name' => 'required|max:25',
            'email' => 'required|max:25',
            'password' => 'required|min:8',
        ];
    }
}
