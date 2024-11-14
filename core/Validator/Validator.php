<?php

namespace App\Core\Validator;

class Validator implements \App\Core\Validator\IValidator
{
    private array $errors = [];

    private array $data;

    public function validate($data, array $rules): bool
    {
        $this->errors = [];
        $this->data = $data;
        foreach ($rules as $key => $rule) {
            $rules = $rule;
            foreach ($rules as $rule) {
                $rule = explode(':', $rule);
                $ruleName = $rule[0];
                $ruleValue = $rule[1] ?? null;
                $error = $this->validateRule($key, $ruleName, $ruleValue);
                if ($error) {
                    $this->errors[$key][] = $error;
                }
            }
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    private function validateRule(string $key, string $ruleName, ?string $ruleValue = null): string|false
    {
        $value = $this->data[$key];
        switch ($ruleName) {
            case 'required':
                if (empty($value)) {
                    return "Field '$key' is required.";
                }
                break;
            case 'min':
                if (strlen($value) < $ruleValue) {
                    return "Field '$key' must be at least '$ruleValue' characters.";
                }
                break;
            case 'max':
                if (strlen($value) > $ruleValue) {
                    return "Field '$key' must be at most '$ruleValue' characters.";

                }
                break;
            case 'email':
                if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return "Field '$key' must be a valid email address.";
                }
                break;
            case 'isSpecChar':
                if ($ruleValue == 'no' && $this->hasSpecialChars($value) > 0) {
                    return "Field '$key' must not contain special characters.";
                }
                if ($ruleValue == 'yes' && $this->hasSpecialChars($value) < 1) {
                    return "Field '$key' must contain special characters.";
                }
                break;

        }

        return false;
    }

    private function hasSpecialChars($string): false|int
    {
        return preg_match('/[^a-zA-Z0-9]/', $string);
    }
}
