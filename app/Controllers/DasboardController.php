<?php

namespace App\Controllers;

use App\Models\ModelBarang;

class DasboardController extends BaseController
{
    protected $modelBarang;
    protected $session;

    public function __construct()
    {
        $this->modelBarang = new ModelBarang();
        helper(['url', 'form']);
        $this->session = session();
    }

    public function index()
    {
        $data = [
            'judul' => 'Barang',
            'barang' => $this->modelBarang->tampil_data(),
            'cart' => $this->session->get('cart') ?? [],
            'total_item' => $this->countCartItems(),
        ];

        echo view('templates/header');
        echo view('templates/sidebar', $data);
        echo view('dasboard', $data);
        echo view('templates/footer');
    }

    public function tambah_ke_keranjang($id)
    {
        $barang = $this->modelBarang->tampilkan($id);
        if (!$barang) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $cart = $this->session->get('cart') ?? [];
        if (isset($cart[$id])) {
            if ($cart[$id]['qty'] < $barang['stok']) {
                $cart[$id]['qty'] += 1;
            }
        } else {
            $cart[$id] = [
                'id' => $barang['product_id'],
                'name' => $barang['nama_produk'],
                'price' => $barang['harga'],
                'qty' => 1,
                'stok' => $barang['stok']
            ];
        }

        $this->session->set('cart', $cart);
        return redirect()->to(base_url('dasboard'));
    }

    public function kurangi_dari_keranjang($id)
    {
        $cart = $this->session->get('cart') ?? [];
        if (isset($cart[$id])) {
            $cart[$id]['qty'] -= 1;
            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }
        }
        $this->session->set('cart', $cart);
        return redirect()->to(base_url('dasboard'));
    }

    public function lihat_keranjang()
    {
        $cart = $this->session->get('cart') ?? [];

        $data = [
            'judul' => 'Keranjang Belanja',
            'cart' => $cart,
            'total_item' => $this->countCartItems(),
        ];

        echo view('templates/header');
        echo view('templates/sidebar', $data);
        echo view('keranjang', $data);
        echo view('templates/footer');
    }

    private function countCartItems()
    {
        $cart = $this->session->get('cart') ?? [];
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['qty'];
        }
        return $total;
    }
}




