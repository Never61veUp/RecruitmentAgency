<?php

namespace App\Core\Persistance;

use App\Core\Config\IConfig;

class DataBase implements IDataBase
{
    private \PDO $pdo;

    public function __construct(private IConfig $config)
    {
        $this->connect();
    }

    public function add(string $tableName, array $data): int|false
    {
        // TODO: Implement add() method.

    }

    public function connect()
    {

        $this->pdo = new \PDO('root', '');
    }
}
