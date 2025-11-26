<?php

namespace App\Core\Validation\Rules;

use App\Core\Validation\Exceptions\ValidationFailedException;
use App\Core\Validation\ValidationRule;

class MaxRule implements ValidationRule
{
    public function apply(string $ruleName, string $field, mixed $value = null, mixed $constraint = null): bool
    {
        if ($constraint === null) throw new ValidationFailedException("Rule 'max' requires a numeric constraint, e.g. max:3");

        if (is_string($value)) {
            if (strlen($value) > $constraint) {
                throw new ValidationFailedException("The field $field must be at a maximum $constraint characters.");
            }
        }

        if (is_int($value) || is_float($value)) {
            if ($value > $constraint) {
                throw new ValidationFailedException("The field $field must be at a maximum $constraint.");
            }
        }

        return true;
    }
}