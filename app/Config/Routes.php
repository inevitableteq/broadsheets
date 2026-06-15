<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index'); // Assuming you kept the default Home controller
$routes->get('register', 'AuthController::register');
$routes->post('register/process', 'AuthController::processRegister');
$routes->get('login', 'AuthController::login');
$routes->post('login/process', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');

// Admin Routes (You can add an admin filter here later if needed)
$routes->get('admin/login', 'AdminController::login');
$routes->post('admin/login/process', 'AdminController::processLogin');

// --- Admin Protected Routes (Requires 'admin' filter) ---
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->post('upload/save', 'AdminController::uploadPdf');
    $routes->get('delete/(:num)', 'AdminController::deletePdf/$1');
    $routes->get('logout', 'AdminController::logout');
});

// Client Routes (Now protected by the 'auth' filter)
$routes->group('client', ['filter' => 'auth'], function ($routes) {
    $routes->get('pdfs', 'ClientController::index');
    $routes->get('download/(:num)', 'ClientController::downloadPdf/$1');
});
