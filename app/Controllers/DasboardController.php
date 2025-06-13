<?php

namespace App\Controllers;

use App\Models\ModelBarang;
use App\Models\ModelRiwayat;

class DasboardController extends BaseController
{
    protected $modelBarang;
    protected $modelRiwayat;
    protected $session;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->session = session();
        $this->modelBarang = new ModelBarang();
        $this->modelRiwayat = new ModelRiwayat();
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
            'total_item' => $this->countCartItems(),
            'totalRiwayat' => $totalRiwayat,
        ];

        echo view('templates/header');
        echo view('templates/sidebar', $data);
        echo view('dasboard', $data);
        echo view('templates/footer');
    }

    public function tambah_ke_keranjang($id)
{
    // Cek apakah user sudah login
    if (!$this->session->get('logged_in')) {
        // Simpan URL agar bisa redirect kembali setelah login
        $this->session->setFlashdata('redirect_back', current_url());

        // Redirect ke form login
        return redirect()->to(base_url('auth/login'))->with('error', 'Silakan login terlebih dahulu untuk menambahkan produk ke keranjang.');
    }

    // Ambil data barang
    $barang = $this->modelBarang->tampilkan($id);
    if (!$barang) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    // Ambil data keranjang dari session
    $cart = $this->session->get('cart') ?? [];

    // Cek apakah barang sudah ada di keranjang
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
            'stok' => $barang['stok'],
        ];
    }

    // Simpan kembali ke session
    $this->session->set('cart', $cart);

    // Redirect kembali ke halaman dasboard
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

    public function hapus_keranjang()
    {
        $this->session->remove('cart'); // Hapus keranjang session
        return redirect()->to(base_url('dasboard'));
    }

    public function pembayaran()
    {
        $cart = $this->session->get('cart') ?? [];

        $data = [
            'judul' => 'Pembayaran',
            'cart' => $cart,
            'total_item' => $this->countCartItems(),
        ];

        echo view('templates/header');
        echo view('templates/sidebar', $data);
        echo view('pembayaran', $data);
        echo view('templates/footer');
    }

 public function proses_pesanan()
{
    $session = session();
    $user_id = $session->get('user_id');  // Ambil user_id dari session

    $dataInvoice = [
        'nama_pemesan' => $this->request->getPost('nama'),
        'alamat' => $this->request->getPost('alamat'),
        'no_telp' => $this->request->getPost('no_telp'),
        'jasa_pengiriman' => $this->request->getPost('jasa_pengiriman'),
        'bank' => $this->request->getPost('bank'),
        'user_id' => $user_id,  // Simpan user_id di database invoice
    ];

    $cartItems = $session->get('cart');

    $this->modelRiwayat->simpan_invoice($dataInvoice, $cartItems);

    // Hapus keranjang dan redirect sesuai kebutuhan
}


    public function detail($id_brg)
    {
        $barang = $this->modelBarang->detail_brg($id_brg);

        if (!$barang) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Produk tidak ditemukan.");
        }

        $data = [
            'barang' => $barang,
            'total_item' => $this->countCartItems(),
            'totalRiwayat' => count($this->modelRiwayat->tampil_data())
        ];

        echo view('templates/header');
        echo view('templates/sidebar', $data);
        echo view('detail_barang', $data);
        echo view('templates/footer');
    }
}





