<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;

class CtrlUsuariosReporte extends BaseController
{
    public function index()
    {
        $cliente = new Cliente();

        $result = $cliente->findAll(); 

        return view ('cliente/reporte', ['clientes'=>$result ?? null]); 
    }
}
