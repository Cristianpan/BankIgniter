<?php

namespace App\Controllers;

use App\Models\User;
use Exception;

class CtrlLogin extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function login()
    {
        $values = $this->request->getPost();
        $response = [
            'message' => '',
            'type' => 'error',
        ];

        try {
            $user = new User();

            $dataUser = $user->where('email', $values['email'])->first();


            if (!$dataUser) {
                throw new Exception("No user found with email");
            }

            if (!password_verify($values['password'], $dataUser['password'])) {
                throw new Exception("Incorrect password");
            }

            session()->set('id', $dataUser['id']);
            session()->set('nombre', $dataUser['nombre']);

            return redirect('inicio');
        } catch (\Throwable $th) {
            var_dump($th); 
            $response['message'] = $th->getMessage();
            return redirect('/')->with('response', $response);
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('id');
        $session->remove('nombre');

        return redirect()->to('/');
    }
}
