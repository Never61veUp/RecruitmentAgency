<?php

namespace App\Core\Auth;

use App\Core\Model\Company;
use App\Core\Model\User;

interface IAuth
{
    public function attempt(string $email, string $password): bool;

    public function logout(): void;

    public function isLoggedIn(): bool;

    public function user(): User|Company|null;

    public function isEmployer(): bool;
}
