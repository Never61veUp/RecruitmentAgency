<?php

namespace App\Core\Model;

class Company
{
    public function __construct(private string $id, private string $title, private string $email, private string $password) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->title;
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
