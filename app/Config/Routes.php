<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::homemenu');
$routes->get('/main', 'AuthController::homemenu');
$routes->match(['get', 'post'], '/login', 'AuthController::login');
$routes->match(['get', 'post'], '/register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');
$routes->match(['get', 'post'], '/services', 'ServiceController::searching');
$routes->match(['get', 'post'], '/services/input', 'ServiceController::inputServicePage');
$routes->match(['get', 'post'], '/services/(:any)', 'ServiceController::serviceDetailPage/$1');
$routes->match(['get', 'post'], '/request', 'RequestController::searching');
$routes->match(['get', 'post'], '/request/input', 'RequestController::inputRequestPage');
$routes->match(['get', 'post'], '/request/(:any)', 'RequestController::requestDetailPage/$1');
$routes->match(['get', 'post'], '/notification', 'NotificationController::notification');
$routes->get('/profile/edit/(:any)', 'BiodataController::profile/$1');
$routes->post('/profile/saveChanges', 'BiodataController::saveChanges');
$routes->get('/profile/delete/(:any)', 'BiodataController::deleteUser/$1');
$routes->get('/profile/(:any)', 'BiodataController::profileview/$1');
$routes->post('update-status', 'NotificationController::updateStatus');
$routes->post('/submit-rating', 'NotificationController::submitRating');
?>