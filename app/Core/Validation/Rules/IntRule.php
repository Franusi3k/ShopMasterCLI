<?php

namespace App\Core\Validation\Rules;

use App\Core\Validation\Exceptions\ValidationFailedException;
use App\Core\Validation\ValidationRule;

class IntRule implements ValidationRule
{
    public function apply(string $ruleName, string $field, mixed $value = null, mixed $constrained = null): bool
    {
        if(!is_int($value)) {
            throw new ValidationFailedException("Value must be type of int");
        }

        return true;
    }
}