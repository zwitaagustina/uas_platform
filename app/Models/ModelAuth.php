<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table = 'users';

    public function cek_login($username, $password)
    {
        // Ambil data user berdasarkan username
        $user = $this->where('username', $username)->first();

        // Verifikasi password langsung (disarankan hash jika memungkinkan)
        if ($user && $user['password'] === $password) {
            return $user;
        }

        return null;
    }
}

                