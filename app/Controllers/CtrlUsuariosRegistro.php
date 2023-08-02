<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlUsuariosRegistro extends BaseController
{
    public function index()
    {
        return view('registro'); 
    }
}
