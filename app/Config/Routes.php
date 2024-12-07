<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->get('/', 'Dashboard::index');

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Routes untuk registrasi dan login tanpa filter
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::storeRegistration');
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::Auth');
    $routes->get('logout', 'Auth::logout');

    $routes->get('/', 'User::index');
});

$routes->group('admin', ['filter' => 'auth', 'namespace' => 'App\Controllers',], function ($routes) {
    $routes->get('dashboard', 'Admin::index');


    $routes->group('film', function ($routes) {
        $routes->get('', 'Film::index');
        $routes->get('create', 'Film::create');
        $routes->post('store', 'Film::store');
        $routes->get('ubah/(:num)', 'Film::edit/$1');
        $routes->post('update/(:num)', 'Film::update/$1');
        $routes->get('delete/(:num)', 'Film::delete/$1');
    });

    $routes->group('studio', static function ($routes) {
        $routes->get('', 'Studio::index');
        $routes->get('create', 'Studio::create');
        $routes->post('store', 'Studio::store');
        $routes->get('ubah/(:num)', 'Studio::edit/$1');
        $routes->post('update/(:num)', 'Studio::update/$1');
        $routes->get('delete/(:num)', 'Studio::delete/$1');
    });

    $routes->group('bioskop', static function ($routes) {
        $routes->get('', 'Bioskop::index');
        $routes->get('create', 'Bioskop::create');
        $routes->post('store', 'Bioskop::store');
        $routes->get('ubah/(:num)', 'Bioskop::edit/$1');
        $routes->post('update/(:num)', 'Bioskop::update/$1');
        $routes->get('delete/(:num)', 'Bioskop::delete/$1');
    });

    $routes->group('pemesanan', static function ($routes) {
        $routes->get('', 'Pemesanan::index');
        $routes->get('create', 'Pemesanan::create');
        $routes->post('store', 'Pemesanan::store');
        $routes->get('ubah/(:num)', 'Pemesanan::edit/$1');
        $routes->post('update/(:num)', 'Pemesanan::update/$1');
        $routes->get('delete/(:num)', 'Pemesanan::delete/$1');
    });

    $routes->group('pengguna', static function ($routes) {
        $routes->get('', 'Pengguna::index');
        $routes->get('create', 'Pengguna::create');
        $routes->post('store', 'Pengguna::store');
        $routes->get('ubah/(:num)', 'Pengguna::edit/$1');
        $routes->post('update/(:num)', 'Pengguna::update/$1');
        $routes->get('delete/(:num)', 'Pengguna::delete/$1');
    });

    $routes->group('pembayaran', static function ($routes) {
        $routes->get('', 'Pembayaran::index');
        $routes->get('create', 'Pembayaran::create');
        $routes->post('store', 'Pembayaran::store');
        $routes->get('ubah/(:num)', 'Pembayaran::edit/$1');
        $routes->post('update/(:num)', 'Pembayaran::update/$1');
        $routes->get('delete/(:num)', 'Pembayaran::delete/$1');
    });

    $routes->group('jadwal', static function ($routes) {
        $routes->get('', 'Jadwal::index');
        $routes->get('create', 'Jadwal::create');
        $routes->post('store', 'Jadwal::store');
        $routes->get('ubah/(:num)', 'jadwal::edit/$1');
        $routes->post('update/(:num)', 'jadwal::update/$1');
        $routes->get('delete/(:num)', 'Jadwal::delete/$1');
    });

    $routes->group('tiket', static function ($routes) {
        $routes->get('', 'Tiket::index');
        $routes->get('create', 'Tiket::create');
        $routes->post('store', 'Tiket::store');
        $routes->get('ubah/(:num)', 'Tiket::edit/$1');
        $routes->post('update/(:num)', 'Tiket::update/$1');
        $routes->get('delete/(:num)', 'Tiket::delete/$1');
    });
});


$routes->group('user', ['filter' => 'auth', 'namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('dashboard', 'User::index');
});
// $routes->get('/', 'Admin::index');
