<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('Posts', 'PostController::index');
$routes->get('Posts/loadMore', 'PostController::loadMore');



