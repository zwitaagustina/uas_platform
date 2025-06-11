<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $session;
    protected $authModel;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->session = session();
        $this->authModel = new ModelAuth();
    }

    public function login()
    {
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

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $this->authModel->cek_login($username, $password);

            if ($user) {
                $this->session->set([
                    'username' => $user['username'],
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('dasboard'));
            } else {
                $this->session->setFlashdata('pesan', '<div class="alert alert-danger">Username atau Password salah!</div>');
                return redirect()->back();
            }
        }

        return view('form_login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}
