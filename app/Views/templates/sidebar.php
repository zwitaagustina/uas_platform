<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                <img src="<?= base_url('assets/img/logo.png') ?>" class="icon-img" alt="Dashboard" style="width: 50px; height: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3">FEMMEA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                <a href="<?= base_url('dasboard') ?>" class="nav-link btn btn-sm btn-primary">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>


              <!-- Tambahkan Riwayat Pesanan di sini -->
            <li class="nav-item">
                 <a class="nav-link d-flex justify-content-between align-items-center" href="<?= base_url('riwayat') ?>">
                    <div>
                <i class="fas fa-history"></i>
                <span>Riwayat Pesanan</span>
                            </div>
               <span class="badge badge-danger badge-counter">
                    <?= esc($totalRiwayat ?? 0) ?>
                </span>
                        </a>
                    </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kategori
            </div>

                        <!-- Nav Item - Tables -->
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kategori/tshirt') ?>">
                <i class="fas fa-fw fa-th"></i>
                <i class="ri-t-shirt-th"></i>
                <span>T-shirt</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kategori/kemeja_blus') ?>">
                <i class="fas fa-fw fa-th"></i>
                <span>Kemeja & Blus</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kategori/sweater_cardigan') ?>">
                <i class="fas fa-fw fa-th"></i>
                <span>Sweater & Cardigan</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kategori/celana') ?>">
                <i class="fas fa-fw fa-th"></i>
                <span>Celana</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kategori/rok_gaun') ?>">
                <i class="fas fa-fw fa-th"></i>
                <span>Rok & Gaun</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kategori/aksesoris') ?>">
                <i class="fas fa-fw fa-th"></i>
                <span>Aksesoris</span>
            </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari untuk..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                         <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('dasboard/lihat_keranjang') ?>">
                                Keranjang Belanja: <?= esc($total_item) ?> items
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- User Information -->
                        <ul class="navbar-nav ml-auto">
                            <?php if (session()->get('username')): ?>
                                <li class="nav-item">
                                    <span class="nav-link">
                                        Selamat Datang, <strong><?= esc(session()->get('username')) ?></strong>
                                    </span>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('auth/login') ?>">
                                        <i class="fas fa-sign-in-alt"></i> Masuk
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>


          </ul>

        </nav>