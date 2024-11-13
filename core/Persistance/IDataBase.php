<?php

namespace App\Core\Persistance;

interface IDataBase
{
    public function add(string $tableName, array $data): int|false;
}
