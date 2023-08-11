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
        $file = $this->request->getFiles()['image'][0] ?? null;

        $key = md5(uniqid(rand(), true));
        
        if ($file) {
            $file->move($this->folderTmp, $key . '.' .  $file->getExtension());
        }
        
        $images = session()->get('images') ?? [];
        $images[] = $key;
        session()->set('images', $images);

        return json_encode(['key' => $key, 'images' => $images]);
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

        foreach ($images as $key => $value) {
            $files = glob($this->folderTmp . $value . ".*");

            if ($files){
                $file = new File($files[0]);
                unset($images[$key]);
                $file->move($this->folder, $file->getRandomName());
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

    private function deleteFile($path)
    {
        $files = glob($path . ".*");

        if ($files && file_exists($files[0])) {
            unlink($files[0]);
        }
    }
}
