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
                                <img src="<?= base_url('assets/img/logo.png') ?>" class="icon-img" alt="Dashboard" style="width: 50px; height: 50px;">
                                <h1 class="h4 text-gray-900 mb-4">Login Akun</h1>
                            </div>

                            <?= session()->getFlashdata('pesan') ?>

                            <form method="post" action="<?= base_url('auth/login') ?>" class="user">
                                <?= csrf_field() ?>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                           name="username" placeholder="Masukkan nama pengguna anda..."
                                           value="<?= old('username') ?>">
                                    <?php if (isset($validation)): ?>
                                        <div class="text-danger small ml-2"><?= $validation->getError('username') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                           name="password" placeholder="Masukkan password anda">
                                    <?php if (isset($validation)): ?>
                                        <div class="text-danger small ml-2"><?= $validation->getError('password') ?></div>
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary form-control">
                                    Login
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                            <a class="small" href="<?= base_url('registrasi/index') ?>">Belum punya akun? Daftar!</a>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
