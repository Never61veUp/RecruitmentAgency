<?php

namespace App\Core\Auth;

interface IAuth
{
    public function attempt(string $email, string $password): bool;

    public function logout(): void;

    public function isLoggedIn(): bool;

    public function user(): array;

    public function table(): string;

    public function email(): string;

    public function password(): string;
}
