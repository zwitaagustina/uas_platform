<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelRiwayat extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'id_invoice';
    protected $allowedFields = ['nama_pemesan', 'alamat', 'tgl_pesan', 'batas_bayar'];

    public function simpan_invoice($dataInvoice, $cartItems)
    {
        date_default_timezone_set('Asia/Jakarta');
        $dataInvoice['tgl_pesan'] = date('Y-m-d H:i:s');
        $dataInvoice['batas_bayar'] = date('Y-m-d H:i:s', strtotime('+1 day'));

        $this->insert($dataInvoice);
        $id_invoice = $this->getInsertID();

        $db = \Config\Database::connect();
        foreach ($cartItems as $item) {
            $dataPesanan = [
                'id_invoice'   => $id_invoice,
                'nama_produk'  => $item['name'],
                'jumlah'       => $item['qty'],
                'harga'        => $item['price'],
                'pilihan'      => '-', // kosongkan jika tidak ada pilihan produk
            ];
            $db->table('pesanan')->insert($dataPesanan);
        }

        return $id_invoice;
    }

    public function tampil_data()
    {
        return $this->findAll();
    }

    public function detail_invoice($id_invoice)
    {
        return $this->where('id_invoice', $id_invoice)->first();
    }

    public function detail_pesanan($id_invoice)
    {
        $db = \Config\Database::connect();
        return $db->table('pesanan')
                  ->where('id_invoice', $id_invoice)
                  ->get()
                  ->getResult();
    }
}

