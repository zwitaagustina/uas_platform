<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['nama_produk', 'deskripsi', 'harga', 'stok', 'gambar', 'kategori'];

    // Ambil semua data produk
    public function tampil_data()
    {
        return $this->findAll();
    }

    // Ambil 1 produk berdasarkan ID (primaryKey)
    public function tampilkan($id)
    {
        return $this->find($id);
    }
}

