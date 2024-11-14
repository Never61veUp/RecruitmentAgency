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

    public function first(string $tableName, array $conditions = []): array|false
    {
        $where = '';

        if (count($conditions) > 0) {
            // Генерация условий WHERE с параметрами для привязки
            $where .= ' WHERE '.implode(' AND ', array_map(fn ($field) => "$field = :$field", array_keys($conditions)));
        }

        // Подготовка SQL-запроса
        $sql = "SELECT * FROM $tableName $where LIMIT 1";

        // Подготовка и выполнение запроса
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($conditions);

        // Получение результата
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?: false;
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
}
