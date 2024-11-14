<?php

namespace App\Core\Session;

interface ISession
{
    public function set(string $key, $value): void;

    public function get(string $key, $default = null);

    public function delete(string $key): void;

    public function destroy(): void;

    public function getFlash(string $key, $default = null);

    public function has(string $key): bool;

    public function all(): array;
}
