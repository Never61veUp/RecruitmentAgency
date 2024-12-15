<?php

namespace App\Core\Auth;

use App\Core\Model\Company;
use App\Core\Model\User;
use App\Core\Persistance\IDataBase;
use App\Core\Session\ISession;

class Auth implements IAuth
{
    public function __construct(private IDataBase $database, private ISession $session) {}

    public function attempt(string $email, string $password): bool
    {

        $user = $this->database->first('users', ['email' => hash('sha256', $email)]);
        $role = 'user';
        if ($user['role'] == '1') {
            $role = 'admin';
        }
        if (! $user) {
            $user = $this->database->first('company', ['email' => hash('sha256', $email)]);
            $role = 'company';
            if (! $user) {

                return false;
            }
        }
        if (! password_verify($password, $user['password'])) {
            return false;
        }

        $this->session->set('email', $user);
        $this->session->set('role', $role);

        return true;

    }

    public function logout(): void
    {
        $this->session->delete('email');
    }

    public function isLoggedIn(): bool
    {
        return $this->session->has('email');
    }

    public function isEmployer(): bool
    {
        if ($this->session->get('role') == 'company') {
            return true;
        }

        return false;

    }

    public function isAdmin(): bool
    {
        if ($this->session->get('role') == 'admin') {
            return true;
        }

        return false;

    }

    public function user(): User|Company|null
    {
        if (! $this->isLoggedIn()) {

            return null;
        }

        $user = $this->database->first('users', ['email' => $this->session->get('email')['email']]);
        if (! $user) {
            $company = $this->database->first('company', ['email' => $this->session->get('email')['email']]);
            if (! $company) {
                return null;
            }

            return new Company(
                $company['id'],
                $company['title'],
                $company['email'],
                $company['password'],
            );

        }

        return new User(
            $user['id'],
            $user['name'],
            $user['surName'],
            $user['email'],
            $user['password'],
        );

    }
}
