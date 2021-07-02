<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //Aqui es mas como imprimir le valor a nuestra forma
        // return parent::toArray($request);
            return [
                'Identificador' => $this->id,
                'Nombre(s)' => Str::of($this->nombre)->upper(),//Upper convierte en mayusculas
                'Apellidos' => Str::of($this->apellidos)->upper(),
                'Edad' => $this->edad,
                'Sexualidad' => $this->sexo,
                'INE' => $this->cic,
                'Tipo de Sangre' => $this->tipo_sangre,
                'Telefono' => $this->telefono,
                'Correo' => $this->correo,
                'Direccion' => $this->direccion,
                'Fecha de Creacion' => $this->created_at->format('d-m-Y h:m'),
                'Fecha de Actualizacion' => $this->updated_at->format('d-m-Y h:m')//CAPAS DE TRANSFORMACION [ ->format('d-m-Y') ]
            ];

    }
    public function with($request)
    {
        return [
            'res' => true,
        ];
    }
}
