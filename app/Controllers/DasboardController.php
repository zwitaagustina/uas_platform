<?php

namespace App\Controllers;

//use App\Models\AsistenModel;

class DasboardController extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('dasboard');
        echo view('templates/footer');
    }
}


