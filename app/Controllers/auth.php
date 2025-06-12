<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                return view('form_login', [
                    'validation' => $this->validator
                ]);
            }

            $model = new ModelAuth();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = $model->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'username' => $user['username'],
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard'); // <-- Redirect berhasil login
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger">Username atau Password salah!</div>');
                return redirect()->back()->withInput();
            }
        }

        return view('form_login');
    }

    public function logout()
{
    session()->destroy();
    return redirect()->to('/auth/login');
}

}





