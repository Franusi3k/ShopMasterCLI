<?php

namespace App\Modules\Product\Action;

use App\Modules\Product\Repositories\ProductRepository;

class ListProductsAction
{
    public function __construct(

        protected ProductRepository $repo

    ) {}

    public function execute(): string
    {
        $output = "";
        foreach ($this->repo->all() as $product) {
            $output .= $this->returnData($product);
        }

        return $output;
    }

    private function returnData($product): string
    {
        $str = str_repeat("-", 50);

        return "\n" . $str . "\nID: " . $product['id'] . "\nName: " . $product['name'] . "\nQuantity: " . $product['quantity'] . "\nPrice: " . $product['price'] . "\nDescription: " . ($product['description'] ?? 'No description...');
    }
}
