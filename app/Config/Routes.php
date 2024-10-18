<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::login');
$routes->get('/signup', 'UserController::signup');
$routes->get('/login', 'UserController::login');
$routes->get('/admin', 'UserController::admin');
$routes->get('/dashboard', 'VerifyLogin::checklogin');
$routes->post('/dashboard', 'VerifyLogin::checklogin');
$routes->post('add', 'Signup::signup');
$routes->post('update/user', 'Update::update');
$routes->get('/dashboard/user', 'Update::dashboard');
$routes->get('/logout', 'Update::logout');
$routes->get('/uploadphoto','UserController::upload');
$routes->post('/upload_photo','Update::photo');
$routes->get('/update','Update::view');
$routes->get('/changepass','Update::changepass');
$routes->post('/change/password','Update::pass');