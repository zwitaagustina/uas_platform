<?php

namespace App\Controllers;

use App\Models\ModelRiwayat;

class RiwayatController extends BaseController
{
    protected $modelRiwayat;

    public function __construct()
    {
        $this->modelRiwayat = new ModelRiwayat();
    }

    public function index()
    {
        $data = [
            'riwayat' => $this->modelRiwayat->tampil_data(),
            'total_item' => session()->get('cart') ? array_sum(array_column(session()->get('cart'), 'qty')) : 0,
            'totalRiwayat' => count($this->modelRiwayat->tampil_data()),
        ];

        echo view('templates/header');
        echo view('templates/sidebar', $data);
        echo view('riwayat', $data);  // <- view yang menampilkan tabel invoice
        echo view('templates/footer');
    }
}



