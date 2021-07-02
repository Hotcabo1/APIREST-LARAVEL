<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'edad',
        'sexo',
        'cic',
        'tipo_sangre',
        'telefono',
        'correo',
        'direccion'
    ];
    //Para Evitar enviar campos que no requerimos u no son necesarios
    //Usamos la propiedad $hidden protected
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
