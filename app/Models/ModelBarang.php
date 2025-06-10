<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['nama_produk', 'deskripsi', 'harga', 'stok', 'gambar', 'kategori'];

    public function tampil_data()
    {
        return $this->findAll();
    }

    public function tampilkan($id)
    {
        return $this->find($id);
    }
    public function detail_brg($id_brg)
    {
        return $this->find($id_brg); // Karena primaryKey sudah di-setup
    }
    }


