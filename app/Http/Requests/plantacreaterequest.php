<?php

namespace reporte_red_datos_cantv\Http\Requests;

use reporte_red_datos_cantv\Http\Requests\Request;

class plantacreaterequest extends Request
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
        'dir_ip' => 'required|ip|unique:plantas',
        'equipo' => 'required|max:100',
        'puerto_atm_fr' => 'required|numeric',
        'puerto_metro' => 'required|numeric',
        'marca_equipo' => 'required|max:15',
        'modelo_equipo' => 'required|max:20',
        'region_equipo' => 'required|max:20',
        'estado_equipo' => 'required|max:20',
        'central_sise' => 'required|max:60',
        'codigo_contable' => 'required|max:15',
        'tipo_puerto' => 'required|max:20',

            //
        ];
    }
}
