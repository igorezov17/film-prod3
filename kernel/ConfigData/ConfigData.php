<?php

namespace Kernel\ConfigData;

class ConfigData implements ConfigDataInterface
{
    public function get($key, $default = null): mixed
    {
        [$file, $key] = explode(".", $key);

        $configPath = APP_PATH . "/kernel/config/$file.php";

        if (!file_exists($configPath)) {
            return $default;
        }

        $config = require $configPath;

        return $config[$key];
    }
}