<?php

namespace Kernel\Session;

interface SessionInterface
{
    public function set($key, $value);

    public function get($key, $default = null);

    public function has(string $key): bool;

    public function remove($key);

    public function destroy();

    public function getFlash($key, $default = null);
}