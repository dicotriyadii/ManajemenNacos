<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Page::login');
$routes->get('/Login', 'Page::login');
$routes->get('/Dashboard', 'Page::dashboard');
$routes->get('/KeuanganPenjualan', 'Page::keuanganPenjualan');
$routes->get('/KeuanganPengeluaran', 'Page::keuanganPengeluaran');
$routes->get('/KeuanganModal', 'Page::keuanganModal');
$routes->get('/Barang', 'Page::barang');
$routes->get('/MasterAkses', 'Page::masterAkses');
$routes->get('/MasterTransaksi', 'Page::masterTransaksi');
$routes->get('/MasterStatus', 'Page::masterStatus');
$routes->get('/MasterMenu', 'Page::masterMenu');
$routes->get('/MasterJenisBarang', 'Page::masterJenisBarang');
$routes->get('/User', 'Page::user');

// Proses
// User
$routes->post('/Login', 'Login_::create');
$routes->post('/TambahUser', 'User_::create');
$routes->post('/EditUser', 'User_::editUser');
$routes->post('/GantiPassword', 'User_::gantiPassword');
$routes->get('/HapusUser/(:num)', 'User_::hapusUser/$1');
$routes->get('/Keluar', 'User_::keluar');

// Master Jenis Barang
$routes->post('/TambahJenisBarang', 'JenisBarang_::create');
$routes->post('/EditJenisBarang', 'JenisBarang_::editJenisBarang');
$routes->get('/HapusJenisBarang/(:num)', 'JenisBarang_::hapusJenisBarang/$1');

// Master Status
$routes->post('/TambahStatus', 'Status_::create');
$routes->post('/EditStatus', 'Status_::editStatus');
$routes->get('/HapusStatus/(:num)', 'Status_::hapusStatus/$1');

// Master Transaksi
$routes->post('/TambahTransaksi', 'Transaksi_::create');
$routes->post('/EditTransaksi', 'Transaksi_::editTransaksi');
$routes->get('/HapusTransaksi/(:num)', 'Transaksi_::hapusTransaksi/$1');

// Master Akses
$routes->post('/TambahAkses', 'Akses_::create');
$routes->post('/EditAkses', 'Akses_::editAkses');
$routes->get('/HapusAkses/(:num)', 'Akses_::hapusAkses/$1');

// Menu
$routes->post('/TambahBarang', 'Barang_::create');
$routes->post('/EditBarang', 'Barang_::editBarang');
$routes->get('/HapusBarang/(:num)', 'Barang_::hapusBarang/$1');

// Transaksi
$routes->post('/TambahKeuangan', 'Keuangan_::create');
$routes->post('/TambahModal', 'Keuangan_::tambahModal');
$routes->post('/EditKeuangan', 'Keuangan_::editKeuanganModal');
$routes->get('/HapusKeuangan/(:num)', 'Keuangan_::hapusKeuangan/$1');
$routes->get('/UpdateStatus/(:num)/(:num)', 'Keuangan_::updateStatus/$1/$2');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
