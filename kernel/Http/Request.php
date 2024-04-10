<?php

namespace Kernel\Http;

class Request 
{
    public array $get;
    public array $post;
    public array $cookie;
    public array $files;
    public array $server;

    private function __construct($get, $post, $cookie, $files, $server)
    {
        $this->get      = $get;
        $this->post     = $post;
        $this->cookie   = $cookie;
        $this->files    = $files;
        $this->server   = $server;
    }

    public static function createFromGlobals()
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    public function uri()
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function method()
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function input(string $key, $default = null): mixed
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

}