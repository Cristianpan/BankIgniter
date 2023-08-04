<?php

namespace App\Models;

use CodeIgniter\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $allowedFields = ["nombre", "apellido", "fechaNacimiento", "curp", "edad"];


    // Validation
    protected $validationRules      = [
        'nombre' => 'required',
        'apellido' => 'required',
        'fechaNacimiento' => 'required|valid_date[Y-m-d]',
        'edad' => 'required|integer',
        'curp' => 'required|regex_match[/^[A-Z]{4}[0-9]{6}[H,M][A-Z]{2}[A-Z]{3}[0-9,A-Z][0-9]$/]'
    ];

    protected $validationMessages   = [
        'nombre' => [
            'required' => 'El nombre es obligatorio',
        ],
        'apellido' => [
            'required' => 'El apellido es obligatorio',
        ],
        'fechaNacimiento' => [
            'required' => 'La fecha de nacimiento es obligatoria',
            'valid_date' => 'La fecha de nacimiento no tiene un formato valido',
        ],
        'edad' => [
            'required' => 'La edad es obligatoria',
            'integer' => 'La  edad debe ser un número entero',
        ],
        'curp' => [
            'required' => 'El CURP es obligatorio',
            'regex_match' => 'El CURP no cumple con el formato válido',
        ],
    ];
}
