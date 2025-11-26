<?php

namespace App\Core\Validation\Rules;

use App\Core\Validation\Exceptions\ValidationFailedException;
use App\Core\Validation\ValidationRule;

class Required implements ValidationRule
{
    public function apply(string $ruleName, string $field, mixed $value = null, mixed $constraint = null): bool
    {
        if(is_null($value) || $value === "") {
            throw new ValidationFailedException("The field $field is required");
        }

        return true;
    }
}