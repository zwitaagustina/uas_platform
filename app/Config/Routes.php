<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ===========================
// Kelompok Routes Dasboard & Keranjang
// Fungsi: Menyajikan tampilan utama dashboard, manajemen keranjang belanja, proses pembayaran, dan detail pesanan.
// ===========================
$routes->get('/dasboard', 'DasboardController::index'); // Halaman utama dashboard (tanpa filter auth)
$routes->get('/dasboard/tambah_ke_keranjang/(:num)', 'DasboardController::tambah_ke_keranjang/$1'); // Menambahkan item ke keranjang berdasarkan ID produk
$routes->get('/dasboard/kurangi_dari_keranjang/(:num)', 'DasboardController::kurangi_dari_keranjang/$1'); // Mengurangi jumlah item di keranjang berdasarkan ID produk
$routes->get('/dasboard/lihat_keranjang', 'DasboardController::lihat_keranjang'); // Menampilkan isi keranjang belanja
$routes->get('/dasboard/hapus_keranjang', 'DasboardController::hapus_keranjang'); // Mengosongkan keranjang belanja
$routes->get('/dasboard/pembayaran', 'DasboardController::pembayaran'); // Halaman pembayaran untuk menyelesaikan transaksi
$routes->post('/dasboard/proses_pesanan', 'DasboardController::proses_pesanan'); // Proses pemesanan setelah pembayaran
$routes->get('dasboard/detail/(:num)', 'DasboardController::detail/$1'); // Menampilkan detail pesanan berdasarkan ID

// ===========================
// Kelompok Routes Riwayat Transaksi
// Fungsi: Menampilkan riwayat transaksi atau invoice dari pengguna.
// ===========================
$routes->get('/dasboard/riwayat', 'RiwayatController::index'); // Menampilkan riwayat pesanan melalui dashboard
$routes->get('/riwayat', 'RiwayatController::index'); // Halaman utama riwayat pesanan
$routes->get('/riwayat/detail/(:num)', 'RiwayatController::detail/$1'); // Menampilkan detail invoice berdasarkan ID transaksi

// ===========================
// Kelompok Routes Kategori Produk
// Fungsi: Menampilkan produk berdasarkan kategori, baik secara umum maupun kategori spesifik.
// ===========================
$routes->get('/kategori/(:segment)', 'KategoriController::kategori/$1'); // Menampilkan produk berdasarkan parameter kategori dinamis
$routes->get('kategori/tshirt', 'KategoriController::tshirt'); // Menampilkan produk kategori T-shirt
$routes->get('kategori/kemeja_blus', 'KategoriController::kemeja_blus'); // Menampilkan produk kategori Kemeja/Blus
$routes->get('kategori/sweater_cardigan', 'KategoriController::sweater_cardigan'); // Menampilkan produk kategori Sweater/Cardigan
$routes->get('kategori/celana', 'KategoriController::celana'); // Menampilkan produk kategori Celana
$routes->get('kategori/rok_gaun', 'KategoriController::rok_gaun'); // Menampilkan produk kategori Rok/Gaun
$routes->get('kategori/aksesoris', 'KategoriController::aksesoris'); // Menampilkan produk kategori Aksesoris

// ===========================
// Kelompok Routes Otentikasi & Registrasi
// Fungsi: Mengatur proses login, logout, dan registrasi pengguna.
// ===========================
$routes->get('/', 'Auth::login'); // Halaman utama langsung mengarahkan ke form login
$routes->match(['get', 'post'], 'auth/login', 'Auth::login'); // Menampilkan form login dan proses validasi login
$routes->get('auth/logout', 'Auth::logout'); // Proses logout pengguna
$routes->match(['get', 'post'], 'registrasi/index', 'Registrasi::index'); // Menampilkan form registrasi dan proses penyimpanan data pendaftaran

// ===========================
// Kelompok Routes Dashboard dengan Filter Otentikasi
// Fungsi: Mengamankan akses ke halaman dashboard dengan filter autentikasi jika diperlukan.
// ===========================
$routes->get('dasboard', 'DasboardController::index', ['filter' => 'auth']); // Halaman dashboard yang dilindungi dengan filter auth




