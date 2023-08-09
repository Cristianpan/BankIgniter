<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlDashboard extends BaseController
{
    public function index()
    {
        return view('inicio'); 
    }
}
