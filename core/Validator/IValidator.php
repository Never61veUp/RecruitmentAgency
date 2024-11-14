<?php

namespace App\Core\Validator;

interface IValidator
{
    public function validate($data, array $rules): bool;

    public function errors(): array;
}
