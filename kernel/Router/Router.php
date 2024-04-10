<?php

namespace Kernel\Router;

use Kernel\Container\Di;
use Kernel\View\ViewInterface;

class Router
{
    private $routes = [
        "GET"  => [],
        "POST" => []
    ];

    private $di;

    private ViewInterface $view;

    public function __construct(Di $di, ViewInterface $view)
    {
        $this->di = $di;
        $this->view = $view;
    }

    public function dispatch($route, $method)
    {
        $this->initRoute();

        if (!$this->getRoutes($route, $method)) {
            print_r('404 | Not found');
            exit();
        } 
    
        if (is_array($this->getRoutes($route, $method)->getAction())) {

            [$controller, $action] = $this->getRoutes($route, $method)->getAction();

            $controller = new $controller($this->di);

            call_user_func([$controller, 'setView'], $this->view);

            return call_user_func([$controller, $action]);
        }

        return $this->getRoutes($route, $method)->getAction()();

    }

    private function initRoute()
    {
        $routes = require APP_PATH . '/kernel/config/routes.php';

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    private function getRoutes($route, $method)
    {
        if (!isset($this->routes[$method][$route])) {
            return false;
        }

        return $this->routes[$method][$route];
    }
}