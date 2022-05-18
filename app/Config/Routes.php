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

$routes->get('/',              'LoginController::index');
$routes->post('/login',        'LoginController::login');
$routes->get('/cerrar_sesion', 'LoginController::cerrar_sesion');

/**
 * Rutas Admin
 */

$routes->add('/admin_view',                     'AdminController::index');
$routes->add('/admin_view_actualizar_usuario',  'AdminController::actualizar');
$routes->get('/obtenerIdUsuario/(:any)',        'AdminController::obtenerIdUsuario/$1');
$routes->post('/crearNuevoUsuario',             'AdminController::crearNuevoUsuario');
$routes->post('/actualizarUsuario',             'AdminController::actualizarUsuario');
$routes->get('/eliminarUsuario/(:any)',         'AdminController::eliminarUsuario/$1');

/**
 * Rutas Pacientes
 */
$routes->add('/pacientes_view',                         'PacientesController::index');
$routes->add('/view_crear_paciente',                    'PacientesController::view_crearPaciente');
$routes->get('/view_crear_cita/(:any)',                 'CitasController::view_crearCita/$1');
$routes->post('/crear_registro_cita',                   'CitasController::crearCita');
$routes->get('/view_actualizar_paciente/(:any)',        'PacientesController::view_actualizarPaciente/$1');
$routes->get('/view_mas_informacion_paciente/(:any)',   'PacientesController::view_mas_informacionPaciente/$1');
$routes->get('/eliminar_paciente/(:any)',               'PacientesController::eliminarPaciente/$1');
$routes->post('/crear_registro_paciente',               'PacientesController::crear_registroPaciente');
$routes->post('/update_paciente_info',                  'PacientesController::update_pacienteInfo');

/**
 * Rutas Doctores
 */
$routes->add('/doctores_view',                      'DoctoresController::index');
$routes->add('/view_crear_doctor',                  'DoctoresController::view_crearDoctor');
$routes->get('/view_actualizar_doctor/(:any)',      'DoctoresController::view_actualizarDoctor/$1');
$routes->get('/view_mas_informacion_doctor/(:any)', 'DoctoresController::view_mas_informacionDoctor/$1');
$routes->get('/eliminar_doctor/(:any)',             'DoctoresController::eliminarDoctor/$1');
$routes->post('/crear_registro_doctor',             'DoctoresController::crear_registroDoctor');
$routes->post('/update_doctor_info',                'DoctoresController::update_doctorInfo');

/**
 * Rutas Citas
 */
$routes->add('/citas_view',                       'CitasController::index');
$routes->get('/view_mas_informacion_cita/(:any)', 'CitasController::view_mas_informacionCita/$1');
$routes->get('/view_editar_cita/(:any)',          'CitasController::view_editarCita/$1');
$routes->post('/update_cita_info',                'CitasController::update_citaInfo');
$routes->get('/eliminar_cita/(:any)',             'CitasController::eliminarCita/$1');


/**
 * Rutas Recepción
 */
$routes->add('/recepcion_view',                         'RecepcionController::index');
$routes->add('/view_crear_recepcion',                   'RecepcionController::view_crear_recepcion');
$routes->get('/view_mas_informacion_recepcion/(:any)',  'RecepcionController::view_mas_informacion_recepcion/$1');
$routes->get('/actualizar_recepcion/(:any)',            'RecepcionController::getRecepcionInfo/$1');
$routes->get('/eliminarRecepcionista/(:any)',           'RecepcionController::eliminarRecepcionista/$1');
$routes->post('/updateRecepcionInfo',                   'RecepcionController::updateRecepcionInfo');
$routes->post('/crearNuevoRegistroRecepcion',           'RecepcionController::crearNuevoRegistroRecepcion');

/**
 * Rutas Tratamientos
 */
$routes->add('/tratamientos_view',                         'TratamientosController::index');
$routes->add('/view_crear_tratamiento',                    'TratamientosController::view_crearTratamiento');
$routes->get('/eliminar_tratamiento/(:any)',               'TratamientosController::eliminarTratamiento/$1');
$routes->get('/view_mas_informacion_tratamiento/(:any)',   'TratamientosController::view_mas_informacionTratamiento/$1');
$routes->get('/view_editar_tratamiento/(:any)',            'TratamientosController::view_editarTratamiento/$1');
$routes->post('/crearTratamiento',                         'TratamientosController::crearTratamiento');
$routes->post('/actualizar_tratamiento',                   'TratamientosController::actualizarTratamiento');

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
