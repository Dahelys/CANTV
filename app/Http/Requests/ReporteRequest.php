<?php

namespace reporte_red_datos_cantv\Http\Requests;

use reporte_red_datos_cantv\Http\Requests\Request;

class ReporteRequest extends Request
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
            'date' => 'required' ,
            'reporte' => 'required',
            'tipo' => 'required',
        ];
    }
}
