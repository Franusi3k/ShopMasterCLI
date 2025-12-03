<?php

namespace App\Core\Validation;

use Exception;

class Validator
{
    public function validate(array $data, array $rules)
    {
        foreach($rules as $field => $fieldRules) {
            $value = $data[$field] ?? null;
            
            if(in_array('nullable', $fieldRules) && (is_null($value) || $value === '')) break;

        }
    }
}