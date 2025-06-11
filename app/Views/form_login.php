<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - FEMMEA</title>
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login Akun</h1>
                            </div>

                            <?= session()->getFlashdata('pesan') ?>

                            <form method="post" action="<?= base_url('auth/login') ?>" class="user">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user"
                                        placeholder="Masukkan Username Anda...">
                                    <?= isset($validation) ? $validation->showError('username', '<div class="text-danger small">', '</div>') : '' ?>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        placeholder="Masukkan Password Anda">
                                    <?= isset($validation) ? $validation->showError('password', '<div class="text-danger small">', '</div>') : '' ?>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Belum punya akun? Daftar!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
