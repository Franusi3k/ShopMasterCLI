<?php

namespace App\Modules\Product\Factories;

use App\Modules\Product\Models\Product;

class ProductFactory
{
    public function make(array $data): Product
    {
        return new Product(
            id: null,
            name: $data['name'],
            quantity: $data['quantity'],
            price: $data['price'],
            description: $data['description'] ?? null
        );
    }
}
