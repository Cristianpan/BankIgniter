<?php

namespace App\Controllers;

use App\Models\Image;
use CodeIgniter\Files\File;


class CtrlForm extends BaseController
{
    private $folderTmp = './files/tmp/';
    private $folder = './files/img/';

    public function index(): string
    {
        $image = new Image(); 
        $data = $image->findAll(); 

        return view('index', ['images' => $data]);
    }

    public function load()
    {
        $file = $this->request->getGet('load');

        return $file;
    }

    public function process()
    {
        $file = $this->request->getFiles()['image'][0] ?? null;

        $key = md5(uniqid(rand(), true));

        if ($file) {
            $file->move($this->folderTmp, $key . '.' .  $file->getExtension());
        }

        return json_encode(['key' => $key]);
    }

    public function processChunk()
    {
        $key = $this->request->getGet('patch');
        $fileName = $this->request->header('Upload-Name');
        $fileData = $this->request->getBody();
        $offset = $this->request->header('Upload-Offset')->getValue();


        $file = new File($fileName);
        $fileTmp = $this->folderTmp . $key . "." . $file->getExtension();

        if (!file_exists($fileTmp)) {
            file_put_contents($fileTmp, '');
        }

        $fileOpen = fopen($fileTmp, 'r+');

        fseek($fileOpen, $offset);
        fwrite($fileOpen, $fileData);
        fclose($fileOpen);
    }

    public function save()
    {
        $images = $this->request->getPost('image');

        !is_dir($this->folder) ? mkdir($this->folder) : '';
        $image = new Image();

        foreach ($images as $value) {

            try {
                //code...
                
                $files = glob($this->folderTmp . $value . ".*");
                if ($files) {
                    $file = new File($files[0]);
                    $fileName = $file->getRandomName();
                    $image->insert(['url' => $fileName]);
                    $file->move($this->folder, $fileName);
                }
            } catch (\Throwable $th) {
                //throw $th;
                var_dump($th);
            }
        }

        return redirect('/')->with('response', 'Imagenes guardadas con éxito');
    }

    public function revert()
    {
        $data = $this->request->getBody();

        $this->deleteFile($this->folderTmp . $data);

        return $data;
    }

    public function deleteTmp()
    {
        $data = json_decode($this->request->getBody());

        foreach ($data as $value) {
            $this->deleteFile($this->folderTmp . $value);
        }

        return json_encode(['ok' => true]);
    }

    private function deleteFile($path)
    {
        $files = glob($path . ".*");

        if ($files && file_exists($files[0])) {
            unlink($files[0]);
        }
    }
}
