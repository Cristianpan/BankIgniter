<?php

namespace App\Controllers;

use CodeIgniter\Files\File;


class CtrlForm extends BaseController
{
    private $folderTmp = './files/tmp/';
    private $folder = './files/img/';

    public function index(): string
    {
        return view('index');
    }

    public function process()
    {
        $file = $this->request->getFiles()['image'][0];
        $images = session()->get('images') ?? []; 

        $key = md5(uniqid(rand(), true)) . '.' . $file->getExtension();
        $images[] = $key; 
        session()->set('images', $images); 

        $file->move($this->folderTmp, $key);

        return json_encode(['key' => $key]);
    }

    public function save()
    {
        $images = $this->request->getPost('image');
        
        !is_dir($this->folder) ? mkdir($this->folder) : '';  
        
        foreach ($images as $key => $value) {
            $file = new File($this->folderTmp . $value);
            unset($images[$key]);
            $file->move($this->folder, $file->getRandomName());
        }

        return redirect('/')->with('response', 'Imagenes guardadas con éxito');
    }

    public function revert()
    {
        $data = $this->request->getBody();

        $this->deleteFile($this->folderTmp . $data);

        return $data;
    }

    private function deleteFile($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
