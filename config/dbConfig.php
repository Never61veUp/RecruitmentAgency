<?php

class dbConfig
{
    public function getConfig()
    {
        return [
            'driver' => 'mysql',
            'host' => 'localhost',
            'port' => '3306',
            'database' => 'agency',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ];
    }
}
