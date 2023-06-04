<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'DashboardController::index');

$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/login', 'AuthController::showLoginForm');
$routes->post('/auth/login', 'UserController::login');
$routes->get('/logout', 'UserController::logout');



$routes->get('/items', 'ItemController::index');
$routes->get('/items/create', 'ItemController::create');
$routes->post('/items/store', 'ItemController::store');

$routes->group('shopping-list', ['namespace' => 'App\Controllers'], function ($routes) {
  $routes->get('/', 'ShoppingListController::index');
  $routes->get('create', 'ShoppingListController::create');
  $routes->get('edit/(:num)', 'ShoppingListController::edit/$1');
  $routes->get('delete/(:num)', 'ShoppingListController::delete/$1');
  $routes->post('store', 'ShoppingListController::store');

});

$routes->group('users', ['namespace' => 'App\Controllers'], function ($routes) {
  $routes->get('/', 'UsersController::index');
  $routes->get('edit/(:num)', 'UsersController::edit/$1');
  $routes->post('update/(:num)', 'UsersController::update/$1');
  $routes->get('create', 'UsersController::create');
  $routes->post('store', 'UsersController::store');
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
