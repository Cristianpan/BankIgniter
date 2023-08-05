<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;
use App\Models\Cuenta;

use function PHPUnit\Framework\isNan;

class CtrlUsuariosRegistro extends BaseController
{
    public function index($clienteId = 0)
    {
       if (!$clienteId) {
            return view('cliente/registro');
        } else if (is_numeric($clienteId)) {
            $cliente = new Cliente(); 
            $datosCliente = $cliente->where('id', $clienteId)->first(); 
           
            if ($datosCliente){
                return view('cliente/editar', ["cliente"=> $datosCliente]);
            }
        }

        return redirect('/'); 
    }

    public function registrar()
    {
        $datosCliente = $this->request->getPost();
        $cliente = new Cliente();
        $cuenta = new Cuenta();
        $db = db_connect();

        $response = [
            'message' => 'El registro ha sido exitoso',
            'type' => 'success',
        ];
        

        try {
            $db->transStart();

             if (!$cliente->insert($datosCliente)) {
                return redirect()->back()->withInput()->with('errors', $cliente->errors());
            }
            
            $datosCuenta = [
                'clienteId' => $cliente->getInsertID(),
            ];
            
            $cuenta->insert($datosCuenta);
            $db->transComplete();

        } catch (\Throwable $th) {
            $db->transRollback();
            $response['message'] = $th->getMessage();
            $response['type'] = 'error';
            return redirect()->back()->withInput()->with('response', $response);
        }

       return redirect('registro')->with('response',  $response);
    }

    public function editar($clienteId, $curp) {
        $datosCliente = $this->request->getPost();
        $cliente = new Cliente();
        $response = [
            'message' => 'Datos del cliente actualizados',
            'type' => 'success',
        ];
        
        try {
            if ($curp === $datosCliente['curp']) {
                unset($datosCliente['curp']); 
            }

            if (!$cliente->update($clienteId, $datosCliente)){
                return redirect()->back()->withInput()->with('errors', $cliente->errors());
            }
        } catch (\Throwable $th) {
            $response['message'] = $th->getMessage();
            $response['type'] = 'error';
            return redirect()->back()->withInput()->with('response', $response);
        }

        return redirect()->to('/curp/' . $this->request->getPost('curp'))->with('response',  $response);
    }
}
