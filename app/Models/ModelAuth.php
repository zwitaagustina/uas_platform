<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password', 'nama'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}


                