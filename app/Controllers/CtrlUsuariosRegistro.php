<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;

class CtrlUsuariosRegistro extends BaseController
{
    public function index()
    {
        return view('registro');
    }

    public function registrar()
    {
        $values = $this->request->getPost();
        $cliente = new Cliente();
        $session = session();


        if (!$cliente->insert($values)) {
            $session->setFlashdata('errors', $cliente->errors());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/registro')->with('message', 'El registro ha sido exitoso');
    }
}
