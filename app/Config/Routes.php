<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// route for view before login to system
$routes->get('/', 'Home::index');
$routes->get('/tentang', 'Home::tentang');
$routes->get('/login', 'UserController::login');
$routes->post('/login', 'UserController::login');
$routes->post('/register', 'UserController::register');
$routes->get('/register', 'UserController::register');
// end route for view before login to system

// routes for admin
$routes->get("admin/dashboard", "AdminController::index");
$routes->get("admin/dashboard/countPrs", "AdminController::countPrs");

$routes->get('/admin/ktgrLoker', 'KtgrLoker::ktgrLoker');
$routes->post('/admin/ktgrLoker/tambah', 'KtgrLoker::tambah');
$routes->post('/admin/ktgrLoker/edit/(:num)', 'KtgrLoker::edit/$1');
$routes->add('/admin/ktgrLoker/hapus/(:num)', 'KtgrLoker::hapus/$1');

$routes->get('/admin/loker', 'Loker::loker');
$routes->post('/admin/loker/tambah', 'Loker::tambah');
$routes->post('/admin/loker/edit/(:num)', 'Loker::edit/$1');
$routes->get('/admin/loker/hapus/(:num)', 'Loker::hapus/$1');

$routes->get('/admin/pencaker', 'Pencaker::pencaker');
$routes->post('/admin/pencaker/tambah', 'Pencaker::tambah');
$routes->post('/admin/pencaker/edit/(:num)', 'Pencaker::edit/$1');
$routes->add('/admin/pencaker/hapus/(:num)', 'Pencaker::hapus/$1');

$routes->get('/admin/lamaran', 'Lamaran::lamaran');
$routes->post('/admin/lamaran/tambah', 'Lamaran::tambah');
$routes->post('/admin/lamaran/edit/(:num)', 'Lamaran::edit/$1');
$routes->add('/admin/lamaran/hapus/(:num)', 'Lamaran::hapus/$1');

$routes->get('/admin/perusahaan', 'Perusahaan::perusahaan');
$routes->post('/admin/perusahaan/tambah', 'Perusahaan::tambah');
$routes->post('/admin/perusahaan/edit/(:num)', 'Perusahaan::edit/$1');
$routes->add('/admin/perusahaan/hapus/(:num)', 'Perusahaan::hapus/$1');

$routes->get('/admin/user', 'User::user');
$routes->add('/admin/user/hapus/(:num)', 'User::hapus/$1');
// end-routes for admin

//routes for instansi
$routes->get('/instansi/dashboard', 'InstansiController::index');

$routes->get('/instansi/loker', 'Loker::loker');

$routes->get('/instansi/perusahaan', 'Perusahaan::perusahaan');
$routes->post('/instansi/perusahaan/tambah', 'Perusahaan::tambah');
$routes->post('/instansi/perusahaan/edit/(:num)', 'Perusahaan::edit/$1');

$routes->get('/instansi/loker', 'Loker::loker');
$routes->post('/instansi/loker/tambah', 'Loker::tambah');
$routes->post('/instansi/loker/edit/(:num)', 'Loker::edit/$1');
$routes->get('/instansi/loker/hapus/(:num)', 'Loker::hapus/$1');


$routes->get('/instansi/lamaran', 'Lamaran::lamaran');
$routes->post('/instansi/lamaran/tambah', 'Lamaran::tambah');
$routes->post('/instansi/lamaran/edit/(:num)', 'Lamaran::edit/$1');
$routes->add('/instansi/lamaran/hapus/(:num)', 'Lamaran::hapus/$1');
//end-routes for instansi


// routes for pencaker
$routes->get('pencaker/dashboard', 'PencakerController::index');

// end-routes for pencaker

// $routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);
// // Admin routes
// $routes->group("admin", ["filter" => "auth"], function ($routes) {
//     $routes->get("admin/dashboard", "AdminController::index");
// });
// // Editor routes
// $routes->group("/instansi", ["filter" => "auth"], function ($routes) {
//     $routes->get("instansi/dashboard", "InstansiController::index");
// });
// $routes->group("/pencaker", ["filter" => "auth"], function ($routes) {
//     $routes->get("pencaker/dashboard", "PencakerController::index");
// });
$routes->get('logout', 'UserController::logout');



$routes->get('/user', 'User::user');
$routes->post('/user/tambah', 'User::tambah');
$routes->post('/user/edit/(:num)', 'User::edit/$1');
$routes->add('/user/hapus/(:num)', 'User::hapus/$1');

$routes->get('/lamaran', 'Lamaran::lamaran');
$routes->post('/lamaran/tambah', 'Lamaran::tambah');
$routes->post('/lamaran/edit/(:num)', 'Lamaran::edit/$1');
$routes->add('/lamaran/hapus/(:num)', 'Lamaran::hapus/$1');

$routes->get('/pencaker', 'Pencaker::pencaker');
$routes->post('/pencaker/tambah', 'Pencaker::tambah');
$routes->post('/pencaker/edit/(:num)', 'Pencaker::edit/$1');
$routes->add('/pencaker/hapus/(:num)', 'Pencaker::hapus/$1');

$routes->get('/loker', 'Loker::loker');
$routes->post('/loker/tambah', 'Loker::tambah');
$routes->post('/loker/edit/(:num)', 'Loker::edit/$1');
$routes->get('/loker/hapus/(:num)', 'Loker::hapus/$1');

$routes->get('/perusahaan', 'Perusahaan::perusahaan');
$routes->post('/perusahaan/tambah', 'Perusahaan::tambah');
$routes->post('/perusahaan/edit/(:num)', 'Perusahaan::edit/$1');
$routes->add('/perusahaan/hapus/(:num)', 'Perusahaan::hapus/$1');


$routes->get('/ktgrLoker', 'KtgrLoker::ktgrLoker');
$routes->post('/ktgrLoker/tambah', 'KtgrLoker::tambah');
$routes->post('/ktgrLoker/edit/(:num)', 'KtgrLoker::edit/$1');
$routes->add('/ktgrLoker/hapus/(:num)', 'KtgrLoker::hapus/$1');
//...

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
