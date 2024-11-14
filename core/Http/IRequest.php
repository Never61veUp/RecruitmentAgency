<?php

namespace App\Core\Http;

use App\Core\Validator\IValidator;

interface IRequest
{
    public static function createFromGlobals(): static;

    public function uri(): string;

    public function method(): string;

    public function input(string $key, $default = null): mixed;

    public function setValidator(IValidator $validator): void;

    public function validate(array $rules): bool;

    public function getErrors(): array;
}
