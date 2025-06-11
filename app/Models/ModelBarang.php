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
    public function updateStok($product_id, $jumlah)
    {
        $builder = $this->builder();
        // Kurangi stok dengan jumlah yang dibeli, false supaya stok - jumlah jadi ekspresi SQL
        $builder->set('stok', 'stok - ' . (int)$jumlah, false);
        $builder->where('product_id', $product_id);
        return $builder->update();
    }
    }


