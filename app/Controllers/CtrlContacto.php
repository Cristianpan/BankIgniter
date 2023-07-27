<?php

namespace App\Controllers;

class CtrlContacto extends BaseController
{
    public function index()
    {
        $data = ["titulo" => "Contacto"]; 
        return view('templates/header', $data)
            . view('contacto/index')
            . view('templates/footer');
    }

    public function catalogo()
    {

        $data = ["titulo" => "Catalogo"]; 

        return view('templates/header', $data)
            . view('contacto/catalogo')
            . view('templates/footer');
    }
}
