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
        $this->router->controller('/', 'App\Controllers\TaskController');
        $this->router->controller('/login', 'App\Controllers\LoginController');

        /**
         * Any thing other than null returned from a filter will prevent the route handler from being dispatched.
         */
        $this->router->filter('auth', function () {
            if (!isset($_COOKIE['admin'])) {
                header('Location: /');
                return false;
            }
            return null;
        });
        $this->router->group(['before' => 'auth'], function ($router) {
            $router->controller('/admin', 'App\Controllers\AdminController');
        });
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
