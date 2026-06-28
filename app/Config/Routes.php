<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ===== API LOGIN =====
$routes->post('api/login', 'Api\Auth::login');

// ===== API PROTECTED (dengan token) =====
$routes->post('post', 'Post::create', ['filter' => 'apiauth']);
$routes->put('post/(:segment)', 'Post::update/$1', ['filter' => 'apiauth']);
$routes->delete('post/(:segment)', 'Post::delete/$1', ['filter' => 'apiauth']);

// ===== API GET (bebas tanpa token) =====
$routes->get('post', 'Post::index');
$routes->get('post/(:segment)', 'Post::show/$1');

// ===== CORS OPTIONS =====
$routes->group('', ['filter' => 'cors'], static function ($routes) {
    $routes->options('post', static function () {});
    $routes->options('post/(:any)', static function () {});
});

// ===== PRAKTIKUM 1 =====
$routes->get('/', 'Home::index');
$routes->get('user/login', 'User::getLogin');
$routes->post('user/login', 'User::postLogin');
$routes->get('user/logout', 'User::logout');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

// ===== PRAKTIKUM 2 - ARTIKEL =====
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

// ===== PRAKTIKUM 4 - ADMIN =====
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});

// ===== PRAKTIKUM 8 - AJAX =====
$routes->get('ajax', 'AjaxController::index');
$routes->get('ajax/getData', 'AjaxController::getData');
$routes->post('ajax/store', 'AjaxController::store');
$routes->post('ajax/update/(:num)', 'AjaxController::update/$1');
$routes->delete('ajax/delete/(:num)', 'AjaxController::delete/$1');