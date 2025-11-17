<?php 

namespace App\Modules\Product\Repositories;

class ProductRepository
{
    private array $products;

    public function __construct()
    {
        $path = 'storage/products.json';

        if(!file_exists($path)){
            $this->products = [];
            return;
        }

        $json = file_get_contents($path);
        $this->products = json_decode($json, true) ?? [];
    }

    public function all(): array
    {
        return $this->products;
    }
}