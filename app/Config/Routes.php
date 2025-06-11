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
$routes->get('dasboard/detail/(:num)', 'DasboardController::detail/$1');
$routes->get('/kategori/(:segment)', 'KategoriController::kategori/$1');
$routes->get('kategori/tshirt', 'KategoriController::tshirt');
$routes->get('kategori/kemeja_blus', 'KategoriController::kemeja_blus');
$routes->get('kategori/sweater_cardigan', 'KategoriController::sweater_cardigan');
$routes->get('kategori/celana', 'KategoriController::celana');
$routes->get('kategori/rok_gaun', 'KategoriController::rok_gaun');
$routes->get('kategori/aksesoris', 'KategoriController::aksesoris');

// Tambahan rute untuk Auth (login & logout)
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');
