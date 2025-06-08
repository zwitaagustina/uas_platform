<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index');
$routes->get('/dasboard', 'DasboardController::index');
$routes->get('dasboard/tambah_ke_keranjang/(:num)', 'DasboardController::tambah_ke_keranjang/$1');
$routes->get('dasboard/kurangi_dari_keranjang/(:num)', 'DasboardController::kurangi_dari_keranjang/$1');
$routes->get('dasboard/lihat_keranjang', 'DasboardController::lihat_keranjang');