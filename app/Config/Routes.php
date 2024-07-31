<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/barang', 'BarangController::index');
$routes->get('/barang/create', 'BarangController::create');
$routes->post('/barang/store', 'BarangController::store');
$routes->post('/barang/edit', 'BarangController::edit');
$routes->get('/barang/edit/(:segment)', 'BarangController::edit/$1');
$routes->post('/barang/update/(:segment)', 'BarangController::update/$1');
$routes->delete('/barang/delete/(:segment)', 'BarangController::delete/$1');
