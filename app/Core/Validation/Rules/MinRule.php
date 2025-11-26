<?php

namespace App\Core\Validation\Rules;

use App\Core\Validation\Exceptions\ValidationFailedException;
use App\Core\Validation\ValidationRule;

class MinRule implements ValidationRule
{
    public function apply(string $ruleName, string $field, mixed $value = null, mixed $constraint = null): bool
    {
        if ($constraint === null) throw new ValidationFailedException("Rule 'min' requires a numeric constraint, e.g. min:3");

        if (is_string($value)) {
            if (strlen($value) < $constraint) {
                throw new ValidationFailedException("The field $field must be at least $constraint characters.");
            }
        }

        if (is_int($value) || is_float($value)) {
            if ($value < $constraint) {
                throw new ValidationFailedException("The field $field must be at least $constraint.");
            }
        }

        return true;
    }
}
