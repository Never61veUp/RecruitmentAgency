<?php

namespace App\Core\Auth;

use App\Core\Persistance\IDataBase;
use App\Core\Session\ISession;

class Auth implements IAuth
{
    public function __construct(private IDataBase $database, private ISession $session) {}

    public function attempt(string $email, string $password): bool
    {
        $user = $this->database->first('users', ['email' => hash('sha256', $email)]);
        if (! $user) {
            $user = $this->database->first('company', ['email' => hash('sha256', $email)]);
            if (! $user) {
                return false;
            }
        }
        if (! password_verify($password, $user['password'])) {
            return false;
        }
        $this->session->set('company_id', $user['id']);
        $this->session->set('user', $user);

        return true;

    }

    public function logout(): void
    {
        // TODO: Implement logout() method.
    }

    public function isLoggedIn(): bool
    {
        // TODO: Implement isLoggedIn() method.
    }

    public function user(): array
    {
        // TODO: Implement user() method.
    }

    public function table(): string
    {
        // TODO: Implement table() method.
    }

    public function email(): string
    {
        // TODO: Implement email() method.
    }

    public function password(): string
    {
        // TODO: Implement password() method.
    }
}
