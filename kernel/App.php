<?php

namespace Kernel;

use Kernel\Container\Di;
use Kernel\Router\Router;
use Kernel\Session\Session;
use Kernel\View\View;

class App
{

    private $di;

    private View $view;

    private Session $session;

    public function __construct(Di $di)
    {
        $this->di = $di;
    }

    public function run()
    {
        $uri    = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $session = new Session();
        $view    = new View($session);
        
        $router = new Router($this->di, $view);
        $router->dispatch($uri, $method);
    }
}