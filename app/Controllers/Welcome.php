<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelRiwayat;

class Welcome extends BaseController
{
    protected $modelBarang;
    protected $modelRiwayat;
    protected $session;

    public function __construct()
    {
        $this->modelBarang = new ModelBarang();
        $this->modelRiwayat = new ModelRiwayat();
        $this->session = session();
    }

    public function index()
    {
        $riwayatData = $this->modelRiwayat->tampil_data();
        $totalRiwayat = is_array($riwayatData) ? count($riwayatData) : 0;

        $cart = $this->session->get('cart') ?? [];

        $data = [
            'judul' => 'Barang',
            'barang' => $this->modelBarang->tampil_data(),
            'cart' => $cart,
            'total_item' => $this->countCartItems($cart),
            'totalRiwayat' => $totalRiwayat,
        ];

        echo view('templates/header');
        echo view('templates/sidebar', $data);
        echo view('dasboard', $data);
        echo view('templates/footer');
    }

    // Fungsi untuk menghitung total item di keranjang
    private function countCartItems(array $cart): int
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['qty'] ?? 0;
        }
        return $total;
    }
}
