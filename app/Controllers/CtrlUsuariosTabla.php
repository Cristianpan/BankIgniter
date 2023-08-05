<?php

namespace App\Controllers;

use App\Models\Cliente;

use function PHPUnit\Framework\matches;

class CtrlUsuariosTabla extends BaseController
{
    public function index($curpCliente = '')
    {
        if ($curpCliente) {
            $cliente = new Cliente();

            $data = $cliente->where('curp', $curpCliente)->first();

            if ($data) {
                session()->set('curp', $curpCliente);
            }
        }

        if (!isset($data) || !$data) {
            session()->set('curp', '');
        }

        return view('cliente/index', ['cliente' => $data ?? null]);
    }

    public function eliminarCliente()
    {
        $clienteId = $this->request->getPost('clienteId');
        $response = [
            'message' =>'Registro del cliente, eliminado',
            'type' => 'success',
        ];

        $cliente = new Cliente(); 

        if (!$cliente->delete($clienteId)) {
            $response = [
                'message' =>'No se ha podido eliminar el cliente',
                'type' => 'error',
            ];
        }

        return redirect()->to('/curp/'. session()->get('curp'))->with('response', $response); 
    }
}
