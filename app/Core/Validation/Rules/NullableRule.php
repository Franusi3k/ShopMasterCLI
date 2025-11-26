<?php

namespace App\Core\Validation\Rules;

use App\Core\Validation\ValidationRule;

class NullableRule implements ValidationRule
{
    public function apply(string $ruleName, string $field, mixed $value = null, mixed $constraint = null): bool
    {
        return true;
    }
}