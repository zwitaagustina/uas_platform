<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\model_auth;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    protected $authModel;
    protected $session;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->authModel = new model_auth();
        $this->session = session();
    }

    public function login()
    {
        // Jika method GET, tampilkan halaman login
        if ($this->request->getMethod() === 'get') {
            return view('form_login'); // pastikan file view ini sesuai
        }

        // Jika method POST, proses login
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('form_login', [
                'validation' => $this->validator
            ]);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari pengguna berdasarkan username
        $user = $this->authModel->where('username', $username)->first();

        if ($user) {
            // Cek password (asumsi disimpan dengan password_hash)
            if (password_verify($password, $user['password'])) {
                // Simpan data session
                session()->set([
                    'id_user' => $user['user_id'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'logged_in' => true
                ]);
                session()->setFlashdata('sukses', 'Login berhasil!');
                return redirect()->to('/dasboard'); // ganti dengan halaman tujuan
            } else {
                session()->setFlashdata('pesan', 'Password salah.');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('pesan', 'Username tidak ditemukan.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/dasboard'));
    }
}
