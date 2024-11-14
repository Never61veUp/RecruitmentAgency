<?php

namespace App\Core\Persistance;

interface IDataBase
{
    public function add(string $tableName, array $data): int|false;

    public function first(string $tableName, array $conditions = []): array|false;
}
