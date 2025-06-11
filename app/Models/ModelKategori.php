<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table = 'products';

    public function getByKategori($kategori)
    {
        return $this->where('kategori', $kategori)->findAll();
    }
}


