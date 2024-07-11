<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('kelola', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Kelola::index');
    $routes->get('tambah', 'Kelola::Tambah');
    $routes->post('insertdata', 'Kelola::InsertData');
    $routes->post('updatedata/(:num)', 'Kelola::UpdateData/$1');
    $routes->post('delete/(:num)', 'Kelola::Delete/$1');
});
