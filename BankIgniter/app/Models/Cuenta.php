<?php

namespace App\Models;

use CodeIgniter\Model;

class Cuenta extends Model
{
    protected $table            = 'cuentas';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['saldo', 'clienteId'];

    protected $beforeInsert = ['generarCuenta']; 

    protected function generarCuenta (array $data): array {
        $data['data']['id'] = mt_rand(1000000000000000, 9999999999999999);
        $data['data']['saldo'] = 0.0; 
        $data['data']['vencimiento'] = date('y') + 5 . "/" . date('m'); 
        return $data;        
    }

}
