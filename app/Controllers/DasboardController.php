<?php

namespace App\Controllers;

use App\Models\ModelBarang;

class DasboardController extends BaseController
{
    public function index()
    {
        $model = new ModelBarang();

        $data = [
            'judul' => 'barang',
            'barang' => $model->tampil_data()
        ];
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('dasboard', $data);
        echo view('templates/footer');
    }
}


