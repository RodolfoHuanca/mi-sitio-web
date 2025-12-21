<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Ruta principal
$routes->get('/', 'Home::index');

// Ruta para insertar
$routes->post('/crear', 'Home::crear');

// Ruta para eliminar (la usaremos en el siguiente bloque)
$routes->get('/eliminar/(:num)', 'Home::eliminar/$1');