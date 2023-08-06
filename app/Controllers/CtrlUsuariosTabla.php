<?php

namespace App\Controllers;

use App\Models\Cliente;
use App\Models\Cuenta;

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


    public function agregarCuenta(){
        $clienteId = $this->request->getPost(); 
        $response = [
            'message' =>'La cuenta ha sido agregada',
            'type' => 'success',
        ];
        
        $cuenta = new Cuenta(); 

        try {
            $cuenta->insert($clienteId); 
        } catch (\Throwable $th) {
            var_dump($th);
            $response = [
                'message' =>'Ha ocurrido un error, por favor intenta nuevamente',
                'type' => 'error',
            ];
        }

        return redirect()->to('/curp/'. session()->get('curp'))->with('response', $response); 
    }


    public function eliminarCuenta(){
        $cuentaId = $this->request->getPost('cuentaId'); 

        $response = [
            'message' =>'La cuenta ha sido eliminada',
            'type' => 'success',
        ];
        
        $cuenta = new Cuenta(); 

        try {
            $cuenta->delete($cuentaId); 
        } catch (\Throwable $th) {
            var_dump($th);
            $response = [
                'message' =>$th->getMessage(),
                'type' => 'error',
            ];
        }

        return redirect()->to('/curp/'. session()->get('curp'))->with('response', $response); 
    }
}
