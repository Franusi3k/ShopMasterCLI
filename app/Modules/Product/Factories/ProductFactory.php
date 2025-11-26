<?php

namespace App\Modules\Product\Factories;

use App\Modules\Product\Models\Product;
use App\Modules\Product\Validations\CreateProductValidator;

class ProductFactory
{
    public function __construct(private CreateProductValidator $validator) {}
    
    public function make(array $data): Product|string
    {
        return "XD";
    }
}