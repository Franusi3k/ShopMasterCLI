<?php

namespace App\Modules\Product\Actions;

use App\Modules\Product\Models\Product;
use App\Modules\Product\Repositories\ProductRepository;

class ShowProductAction
{
    public function __construct(private ProductRepository $repo) {}

    public function execute(int $id): string
    {
        $product = $this->repo->find($id);

        return $this->returnData($product);
    }

    public function returnData(array $product)
    {
        return "Dane produktu:\nId: " . $product['id'] . "\nName: " . $product['name'] . "\nQuantity: " . $product['quantity'] . "\nPrice: " . $product['price'] . "\nDescription: " . $product['description'] . "\n";
    }
}