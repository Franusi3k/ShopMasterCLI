<?php

namespace App\Modules\Product\Validations;

class CreateProductValidator
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'price' => ['required', 'float', 'min:0.01'],
            'quantity' => ['required', 'int', 'min:0'],
            'description' => ['nullable', 'string', 'max:500'],
        ];
    }
}