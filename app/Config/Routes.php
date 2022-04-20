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

/**
 * Rutas Login
 */

$routes->get('/', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/cerrar_sesion', 'LoginController::cerrar_sesion');

/**
 * Rutas Admin
 */

$routes->add('/admin_view', 'AdminController::index');
$routes->add('/admin_view_actualizar_usuario', 'AdminController::actualizar');
$routes->get('/obtenerIdUsuario/(:any)', 'AdminController::obtenerIdUsuario/$1');
$routes->post('/crearNuevoUsuario', 'AdminController::crearNuevoUsuario');
$routes->post('/actualizarUsuario', 'AdminController::actualizarUsuario');
$routes->get('/eliminarUsuario/(:any)', 'AdminController::eliminarUsuario/$1');

/**
 * Rutas Pacientes
 */
$routes->add('/pacientes_view', 'PacientesController::index');

/**
 * Rutas Citas
 */
$routes->add('/citas_view', 'CitasController::index');

/**
 * Rutas Recepción
 */
$routes->add('/recepcion_view', 'RecepcionController::index');




// $routes->add('/contactar', 'Home::contacto', ['as' => 'contacto']);
//|$routes->add('/formulario', 'Home::formulario');
//$routes->post('/envioPost', 'Home::enviarPost');

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
