<?php

namespace App\Core\Persistance;

use App\Core\Config\IConfig;
use PDO;
use PDOException;

class DataBase implements IDataBase
{
    private PDO $pdo;

    public function __construct(private IConfig $config)
    {
        $this->connect();
    }

    public function add(string $tableName, array $data): int|false
    {

        $fields = array_keys($data);
        $columns = implode(', ', $fields);
        $binds = implode(', ', array_map(fn ($field) => ":$field", $fields));
        $placeholders = array_map(fn ($field) => ":$field", $fields);
        $sql = "INSERT INTO $tableName ($columns) VALUES ($binds)";
        $smt = $this->pdo->prepare($sql);
        try {
            $smt->execute($data);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            dd("$e");
        }
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
        try {
            $this->pdo = new PDO(
                "$driver:host=$host;port=$port;dbname=$database;charset=$charset",
                $username,
                $password);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        //        dd("$driver:host=$host;port=$port;dbname=$database;charset=$charset", $username, $password);

    }

    public function first(string $tableName, ?array $conditions = []): ?array
    {
        $where = '';
        if (count($conditions) > 0) {
            $where = 'WHERE '.implode(' AND ', array_map(fn ($field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = "SELECT * FROM $tableName $where LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        foreach ($conditions as $field => $value) {
            $stmt->bindValue(":$field", $value);
        }

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Возвращение результата
        return $result ?: null;
    }

    public function findByKey(string $tableName, string $key, string $value): array|false
    {
        $sql = "SELECT * FROM $tableName WHERE $key = :value";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':value', $value);

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result ?: false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function get(string $tableName, array $conditions = [], array $likeConditions = []): array
    {
        $where = '';

        if (count($conditions) > 0) {
            $where .= implode(' AND ', array_map(fn ($field) => "`$field` = :$field", array_keys($conditions)));
        }

        if (count($likeConditions) > 0) {
            $likeWhere = implode(' AND ', array_map(fn ($field) => "`$field` LIKE :$field", array_keys($likeConditions)));
            $where .= ($where ? ' AND ' : '').$likeWhere;
        }

        if ($where) {
            $where = 'WHERE '.$where;
        }

        $sql = "SELECT * FROM `$tableName` $where";

        $stmt = $this->pdo->prepare($sql);

        foreach ($conditions as $field => $value) {
            $stmt->bindValue(":$field", $value);
        }

        foreach ($likeConditions as $field => $value) {
            $stmt->bindValue(":$field", "%$value%");
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
