<?php

namespace App\Core\Validation;

use App\Core\Validation\Rules\BooleanRule;
use App\Core\Validation\Rules\FloatRule;
use App\Core\Validation\Rules\IntRule;
use App\Core\Validation\Rules\MaxRule;
use App\Core\Validation\Rules\MinRule;
use App\Core\Validation\Rules\RequiredRule;
use App\Core\Validation\Rules\StringRule;
use Exception;

class Validator
{
    private static $ruleClasses =
    [
        'required' => RequiredRule::class,
        'max' => MaxRule::class,
        'min' => MinRule::class,
        'boolean' => BooleanRule::class,
        'string' => StringRule::class,
        'float' => FloatRule::class,
        'int' => IntRule::class
    ];

    public function validate(array $data, array $rules)
    {
        foreach ($rules as $field => $fieldRules) {
            $value = $data[$field] ?? null;

            if (in_array('nullable', $fieldRules) && (is_null($value) || $value === '')) continue;

            foreach ($fieldRules as $fs) {
                $constraint = null;
                $parts = explode(":", $fs);

                if (count($parts) === 2) {
                    [$fs, $constraint] = $parts;
                }

                $class = self::$ruleClasses[$fs] ?? null;

                if (is_null($class)) {
                    throw new Exception("Validation rule '$fs' not found for field '$field'");
                }

                $rule = new $class();

                $rule->apply($fs, $field, $value, $constraint ?? null);
            }
        }
    }
}