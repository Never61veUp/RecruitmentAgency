<?php

namespace App\Services;

use App\Core\Model\User;
use App\Core\Persistance\IDataBase;

class UserService
{
    public function __construct(private IDataBase $database) {}

    public function getAllUsers(): array
    {
        $users = $this->database->get('users');

        $users = array_map(function ($user) {
            return new User(id: $user['id'], name: $user['name'], email: $user['email'], surName: $user['surname'], password: $user['password']);
        }, $users);

        return $users;
    }

    public function getCount(): int
    {
        $users = $this->database->get('users');

        return count($users);
    }
}
