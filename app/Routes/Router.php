<?php


namespace App\Routes;


use Phroute\Phroute\RouteCollector;

class Router
{
    private RouteCollector $router;

    /**
     * Init route collector.
     */
    public function __construct()
    {
        $this->router = new RouteCollector;
    }

    /**
     * Declare routes.
     */
    public function initRoutes()
    {
        $this->router->controller('/', 'App\Controllers\IndexController');
    }

    /**
     * Get collector instance.
     * @return RouteCollector
     */
    public function getRouter(): RouteCollector
    {
        return $this->router;
    }
}
