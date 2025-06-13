<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\model_auth;

class Registrasi extends BaseController
{
    protected $modelAuth;

    public function __construct()
    {
        $this->modelAuth = new model_auth();
        helper('form');
    }

    public function index()
    {
        $rules = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => ['required' => 'Nama wajib diisi!'],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username wajib diisi!',
                    'is_unique' => 'Username sudah digunakan!',
                ],
            ],
            'password_1' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password wajib diisi!',
                    'min_length' => 'Password minimal 6 karakter!',
                ],
            ],
            'password_2' => [
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password_1]',
                'errors' => [
                    'required' => 'Konfirmasi password wajib diisi!',
                    'matches' => 'Konfirmasi password tidak cocok!',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $data = ['validation' => $this->validator];
            echo view('templates/header');
            echo view('registrasi', $data);
            echo view('templates/footer');
        } else {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password_1'), PASSWORD_DEFAULT),
            ];

            $this->modelAuth->insert($data);

            session()->setFlashdata('sukses', 'Registrasi berhasil! Silakan login.');
            return redirect()->to(base_url('auth/login'));
        }
    }
}
