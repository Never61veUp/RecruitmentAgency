<?php

namespace App\Core\Config;

interface IConfig
{
    public function get(string $key, $default = null);
}
