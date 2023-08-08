<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlMailer extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function enviarEmail()
    {
        $values = $this->request->getPost();

        $email = \Config\Services::email();

        $response = [
            'message' => 'Formulario enviado correctamente',
            'type' => 'success', 
        ]; 


        $email->setFrom($values['correo'], $values['nombre'] .  " " . $values['apellido'])
        ->setTo('codeIgniter@gmail.com')
        ->setSubject('Registro gratuito')
        ->setMessage(view('templates/mailDetail',  ['contacto' => $values] )); 
        
        if ($email->send()) {
            return redirect()->to('/#contacto')->with('response', $response);  
        } else {
            $response['message'] = 'Algo ha salido mal. Por favor intente nuevamente'; 
            $response['type'] = 'error';  
            return redirect()->to('#contacto')->withInput()->with('response', $response); 
        }
         
    }
}
