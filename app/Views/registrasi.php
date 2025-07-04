<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi - FEMMEA</title>
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
                                <h1 class="h4 text-gray-900 mb-4">Registrasi Akun</h1>
                            </div>

                            <!-- Notifikasi flashdata -->
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-danger text-center">
                                    <?= session()->getFlashdata('pesan') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('sukses')) : ?>
                                <div class="alert alert-success text-center">
                                    <?= session()->getFlashdata('sukses') ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="<?= base_url('registrasi/index') ?>" class="user">
                                <?= csrf_field() ?>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                           name="nama" placeholder="Masukkan nama anda..."
                                           value="<?= old('nama') ?>">
                                    <?php if (isset($validation) && $validation->hasError('nama')): ?>
                                        <div class="text-danger small ml-2"><?= $validation->getError('nama') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                           name="username" placeholder="Masukkan username anda..."
                                           value="<?= old('username') ?>">
                                    <?php if (isset($validation) && $validation->hasError('username')): ?>
                                        <div class="text-danger small ml-2"><?= $validation->getError('username') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                           name="password_1" placeholder="Masukkan password anda">
                                    <?php if (isset($validation) && $validation->hasError('password_1')): ?>
                                        <div class="text-danger small ml-2"><?= $validation->getError('password_1') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                           name="password_2" placeholder="Ulangi password anda">
                                    <?php if (isset($validation) && $validation->hasError('password_2')): ?>
                                        <div class="text-danger small ml-2"><?= $validation->getError('password_2') ?></div>
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary form-control">
                                    Daftar
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth/login') ?>">Sudah punya akun? Login!</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
