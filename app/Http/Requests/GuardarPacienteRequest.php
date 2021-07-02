<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarPacienteRequest extends FormRequest
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
            //Regla de oro si el campo deseado no esta llenado, no se puede continuar hasta que se llene
            "nombre" => "required",
            "apellidos" => "required",
            "edad" => "required",
            "sexo" => "required",
            "cic" => "required|unique:pacientes,cic",//|unique:pacientes,cic" SIRVE PARA COMPROBAR QUE EL DATO ESCRITO SEA UNICO E IRREPETIBLE
            "tipo_sangre" => "required",
            "telefono" => "required",
            "correo" => "required",
            "direccion" => "required"
        ];
    }
}
