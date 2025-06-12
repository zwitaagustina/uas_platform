<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use CodeIgniter\Controller;

class Registrasi extends Controller
{
    public function index()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama' => 'required',
                'username' => 'required|is_unique[users.username]',
                'password_1' => 'required|min_length[5]|matches[password_2]',
                'password_2' => 'required|matches[password_1]'
            ];

            $messages = [
                'nama' => [
                    'required' => 'Nama wajib diisi!'
                ],
                'username' => [
                    'required' => 'Username wajib diisi!',
                    'is_unique' => 'Username sudah digunakan!'
                ],
                'password_1' => [
                    'required' => 'Password wajib diisi!',
                    'min_length' => 'Password minimal 5 karakter',
                    'matches' => 'Password tidak cocok'
                ],
                'password_2' => [
                    'required' => 'Konfirmasi password wajib diisi!',
                    'matches' => 'Password tidak cocok'
                ]
            ];

            if (!$this->validate($rules, $messages)) {
                return view('registrasi', [
                    'validation' => $this->validator
                ]);
            }

            $model = new ModelAuth();
            $model->save([
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password_1'), PASSWORD_DEFAULT),
                'nama'     => $this->request->getPost('nama')
            ]);

            session()->setFlashdata('pesan', '<div class="alert alert-success">Registrasi berhasil, silakan login!</div>');
            return redirect()->to('auth/login');
        }

        return view('registrasi');
    }
}
