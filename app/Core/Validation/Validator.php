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

$validator = new Validator();

$data = [
    'name'        => 'Milk 200ml',
    'price'       => 15.99,
    'quantity'    => 10,
    'description' => ''
];

$rules = [
    'name' => ['required', 'string', 'min:3', 'max:100'],
    'price' => ['required', 'float', 'min:0.01'],
    'quantity' => ['required', 'int', 'min:0'],
    'description' => ['nullable', 'string', 'max:500']
];

try {
    $validator->validate($data, $rules);
    echo "Validation passed!\n";
} catch (Exception $e) {
    echo "Validation failed: " . $e->getMessage() . "\n";
}