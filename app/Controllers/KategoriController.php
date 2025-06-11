<?php

namespace App\Controllers;

use App\Models\ModelKategori;

class KategoriController extends BaseController
{
    protected $modelKategori;

    public function __construct()
    {
        $this->modelKategori = new ModelKategori();
    }

    public function kategori($segment)
    {
        // Mapping segment URL ke nama kategori di database
        $mapping = [
            'tshirt' => 'Tshirt',
            'kemeja_blus' => 'Kemeja & Blus',
            'sweater_cardigan' => 'Sweater & Cardigan',
            'celana' => 'Celana',
            'rok_gaun' => 'Rok & Gaun',
            'aksesoris' => 'Aksesoris'
        ];

        if (!isset($mapping[$segment])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Kategori '$segment' tidak ditemukan.");
        }

        $kategoriDb = $mapping[$segment];

    $data['judul'] = $kategoriDb;
    $data['barang'] = $this->modelKategori->getByKategori($kategoriDb);

    // Ambil data keranjang dari session untuk total_item
    $session = session();
    $cart = $session->get('cart') ?? [];

    $total_item = 0;
    foreach ($cart as $item) {
        $total_item += $item['qty'];
    }

    $dataSidebar = ['total_item' => $total_item];

    echo view('templates/header');
    echo view('templates/sidebar', $dataSidebar);
    echo view('kategori', $data);
    echo view('templates/footer');
}
}