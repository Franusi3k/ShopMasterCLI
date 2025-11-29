<?php

namespace App\Core\Validation\Rules;

use App\Core\Validation\Exceptions\ValidationFailedException;
use App\Core\Validation\ValidationRule;

class FloatRule implements ValidationRule
{
    public function apply(string $ruleName, string $field, mixed $value = null, mixed $constrained = null): bool
    {
        if(!is_float($value)) {
            throw new ValidationFailedException("Value must be type of float");
        }

        return true;
    }
} 