<?php

namespace Kernel\ConfigData;

interface ConfigDataInterface
{
    public function get(string $key, $default = null): mixed;
}