<?php

namespace App\Core\Model;

class User
{
    public function __construct(private string $id, private string $name, private string $surName, private string $email, private string $password) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurName(): string
    {
        return $this->surName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
