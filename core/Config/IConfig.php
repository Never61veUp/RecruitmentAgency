<?php

namespace App\Core\Config;

interface IConfig
{
    public function getConfig(string $key, $default = null);
}
