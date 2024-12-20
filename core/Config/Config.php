<?php

namespace App\Core\Config;

class Config implements IConfig
{
    public function get(string $key, $default = null)
    {
        [$file, $key] = explode('.', $key);
        $configPath = APP_PATH."/config/$file.php";

        if (! file_exists($configPath)) {

            return $default;

        }

        $config = require $configPath;

        return $config[$key] ?? $default;
    }
}
