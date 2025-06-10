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
                'stok' => $barang['stok'],
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
    $nama_pemesan    = $this->request->getPost('nama');
    $alamat          = $this->request->getPost('alamat');
    $no_telp         = $this->request->getPost('no_telp'); // opsional jika masih ada
    $jasa_pengiriman = $this->request->getPost('jasa_pengiriman');
    $bank            = $this->request->getPost('bank');
    $cart            = $this->session->get('cart') ?? [];

    if (empty($cart)) {
        return redirect()->to(base_url('dasboard/lihat_keranjang'))->with('error', 'Keranjang kosong.');
    }

    $dataInvoice = [
        'nama_pemesan'     => $nama_pemesan,
        'alamat'           => $alamat,
        'no_telp'          => $no_telp,
        'jasa_pengiriman'  => $jasa_pengiriman,
        'bank'             => $bank,
    ];

    $id_invoice = $this->modelRiwayat->simpan_invoice($dataInvoice, $cart);

    if ($id_invoice) {
        $this->session->remove('cart');
        $data = [
            'judul' => 'Konfirmasi Pesanan',
            'id_invoice' => $id_invoice,
            'total_item' => $this->countCartItems(),
        ];

        echo view('templates/header');
        echo view('templates/sidebar', $data);
        echo view('konfirmasi_pesanan', $data);
        echo view('templates/footer');
    } else {
        return redirect()->back()->with('error', 'Gagal memproses pesanan.');
    }
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





