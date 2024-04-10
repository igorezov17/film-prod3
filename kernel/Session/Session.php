<?php

namespace Kernel\Session;

class Session implements SessionInterface
{

    public function __construct()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null)
    {
       return $this->has($key) ? $_SESSION[$key] : $default;
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy(): void
    {
        session_destroy();
    }

    public function getFlash($key, $default = null)
    {
        $value = $this->get($key, $default);
        $this->remove($key);

        return $value;
    }

}