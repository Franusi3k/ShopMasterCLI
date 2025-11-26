<?php

namespace App\Core\Validation\Rules;

use App\Core\Validation\Exceptions\ValidationFailedException;
use App\Core\Validation\ValidationRule;

class BooleanRule implements ValidationRule
{
    public function apply(string $ruleName, string $field, mixed $value = null, mixed $constraint = null): bool
    {
        if(!is_bool($value)) {
            throw new ValidationFailedException("Value $value must be type of boolean");
        }

        return true;
    }
}