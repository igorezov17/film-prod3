<?php

namespace Kernel\Container;

class Di 
{
    private $services = [];

    public function set($key, $value)
    {
        $this->services[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return $this->has($key) ?? $default;
    }

    private function has($key) 
    {
        return (isset($this->services[$key]) ? $this->services[$key] : null);
    }
}