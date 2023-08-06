<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

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

    protected $afterFind = ['obtenerCuentas'];
    protected $beforeInsert = ['existeCurp'];
    protected $beforeUpdate = ['existeCurp'];

    protected function existeCurp(array $data): array
    {
        if (isset($data['data']['curp'])) {
            $cantidad = $this->where('curp', $data['data']['curp'])->countAllResults();

            if ($cantidad) {
                throw new Exception('La CURP del cliente ya ha sido registrada');
            }
        }

        return $data;
    }

    protected function obtenerCuentas(array $data)
    {
        $cuenta = new Cuenta();
        if ($data['method'] === 'first') {

            if (isset($data["data"]['id'])) {
                $data['data']['cuentas'] = $cuenta->where('clienteId', $data['data']["id"])->findAll();
            }
        } else if ($data['method'] === 'findAll') {
            foreach ($data['data'] as $key => $value) {
                
                $data['data'][$key]['cuentas'] = $cuenta->where('clienteId', $value['id'])->findAll(); 
            }
        }

        return $data;
    }
}
