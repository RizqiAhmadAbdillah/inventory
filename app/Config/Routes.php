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

$routes->get('create-db', function () {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('inventory')) {
        echo 'Database inventory successfully created!';
    }
});

$routes->get('/', 'Home::index');
$routes->get('/cabang', 'Cabang::index');
$routes->post('/cabang', 'Cabang::index');
$routes->post('/cabang/search', 'Cabang::search/$1');
$routes->get('/cabang/edit/(:segment)', 'Cabang::edit/$1');
$routes->get('/cabang/(:any)', 'Cabang::detail/$1');
$routes->post('/cabang/save', 'Cabang::save');
$routes->post('/cabang/update/(:segment)', 'Cabang::update/$1');
$routes->delete('/cabang/(:num)', 'Cabang::delete/$1');

$routes->get('/jenisbarang', 'JenisBarang::index');
$routes->post('/jenisbarang', 'JenisBarang::index');
$routes->post('/jenisbarang/search', 'JenisBarang::search/$1');
$routes->get('/jenisbarang/edit/(:segment)', 'JenisBarang::edit/$1');
$routes->get('/jenisbarang/(:any)', 'JenisBarang::detail/$1');
$routes->post('/jenisbarang/save', 'JenisBarang::save');
$routes->post('/jenisbarang/update/(:segment)', 'JenisBarang::update/$1');
$routes->delete('/jenisbarang/(:num)', 'JenisBarang::delete/$1');

$routes->get('/barang', 'Barang::index');
$routes->post('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/search', 'Barang::search/$1');
$routes->get('/barang/edit/(:segment)', 'Barang::edit/$1');
$routes->get('/barang/(:num)', 'Barang::detail/$1');
$routes->post('/barang/save', 'Barang::save');
$routes->post('/barang/update/(:segment)', 'Barang::update/$1');
$routes->delete('/barang/(:num)', 'Barang::delete/$1');

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
