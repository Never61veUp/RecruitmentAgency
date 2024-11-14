<?php

namespace App\Core\Persistance;

use App\Core\Config\IConfig;
use PDO;

class DataBase implements IDataBase
{
    private PDO $pdo;

    public function __construct(private IConfig $config)
    {
        $this->connect();
    }

    public function add(string $tableName, array $data): int|false
    {
        // TODO: Implement add() method.

    }

    public function connect(): void
    {

        $driver = $this->config->get('dbConfig.driver');

        $host = $this->config->get('dbConfig.host');

        $port = $this->config->get('dbConfig.port');
        $database = $this->config->get('dbConfig.database');
        $username = $this->config->get('dbConfig.username');
        $password = $this->config->get('dbConfig.password');
        $charset = $this->config->get('dbConfig.charset');
        //        dd("$driver:host=$host;port=$port;dbname=$database;charset=$charset", $username, $password);
        $this->pdo = new PDO("$driver:host=$host;port=$port;dbname=$database;charset=$charset", $username, $password);

    }
}
