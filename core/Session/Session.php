<?php

namespace App\Core\Session;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function delete($key): void
    {
        unset($_SESSION[$key]);
    }

    public function destroy(): void
    {

        session_destroy();

    }

    public function getFlash(string $key, $default = null)
    {
        $value = $this->get($key, $default);
        $this->delete($key);

        return $value;
    }

    public function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function all()
    {
        return $_SESSION;
    }
}
