<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->post("register", "AuthController::register");
$routes->post("login", "AuthController::login");
$routes->get("user", "AuthController::userdetails");
$routes->get("logout", "AuthController::logout");

$routes->group("action", function ($routes) {
    $routes->get("list-action", "ActionController::listAction");
    $routes->get("add-action", "ActionController::addAction");
});

