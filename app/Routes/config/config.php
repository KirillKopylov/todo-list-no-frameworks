<?php

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use App\Routes\Router;

/**
 * Init and handle routes.
 */
$router = new Router;
$router->initRoutes();
$routerData = $router->getRouter()->getData();
$dispatcher = new Dispatcher($routerData);

try {
    echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch (HttpRouteNotFoundException $exception) {
    echo 404;
} catch (HttpMethodNotAllowedException $exception) {
    header($exception->getMessage());
}