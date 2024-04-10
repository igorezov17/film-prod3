<?php

namespace Kernel\Router;

class Route
{
    private $uri;

    private $method;

    private $action;


    public function __construct($uri, $method, $action)
    {
        $this->uri    = $uri;
        $this->method = $method;
        $this->action = $action;
    }

    public static function get($uri, $action) 
    {
        return new static($uri, 'GET', $action);
    }

    public static function post($uri, $action)
    {
        return new static($uri, 'POST', $action);
    }


    public function getUri()
    {
        return $this->uri;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getAction()
    {
        return $this->action;
    }
}