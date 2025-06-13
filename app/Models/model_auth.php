<?php

namespace App\Models;

use CodeIgniter\Model;

class model_auth extends Model
{
    protected $table = 'users'; // nama tabel
    protected $primaryKey = 'user_id'; // primary key
    protected $allowedFields = ['nama', 'username', 'password']; // kolom yang boleh diisi/diperbarui
    
    // Cari user berdasarkan username
    public function getUserByUsername(string $username)
    {
        return $this->where('username', $username)->first();
    }
}
