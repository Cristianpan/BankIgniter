<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlUsuariosReporte extends BaseController
{
    public function index()
    {
        return view ('cliente/reporte'); 
    }
}
