<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index');
$routes->get('/dasboard', 'DasboardController::index');
$routes->get('/dasboard/tambah_ke_keranjang/(:num)', 'DasboardController::tambah_ke_keranjang/$1');
$routes->get('/dasboard/kurangi_dari_keranjang/(:num)', 'DasboardController::kurangi_dari_keranjang/$1');
$routes->get('/dasboard/lihat_keranjang', 'DasboardController::lihat_keranjang');
$routes->get('/dasboard/hapus_keranjang', 'DasboardController::hapus_keranjang');
$routes->get('/dasboard/pembayaran', 'DasboardController::pembayaran');
$routes->post('/dasboard/proses_pesanan', 'DasboardController::proses_pesanan');
$routes->get('/dasboard/riwayat', 'RiwayatController::index');
$routes->get('/riwayat', 'RiwayatController::index'); // halaman utama riwayat
$routes->get('/riwayat/detail/(:num)', 'RiwayatController::detail/$1'); // detail invoice berdasarkan ID
