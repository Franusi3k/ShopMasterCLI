<?php 

namespace App\Modules\Product\Repositories;

use App\Modules\Product\Exceptions\ProductNotFoundException;
use App\Modules\Product\Factories\ProductFactory;
use App\Modules\Product\Models\Product;

class ProductRepository
{
    private array $products;
    private ProductFactory $factory;

    public function __construct(ProductFactory $factory)
    {
        $path = 'storage/products.json';

        if(!file_exists($path)){
            $this->products = [];
            return;
        }

        $json = file_get_contents($path);
        $this->products = json_decode($json, true) ?? [];
        $this->factory = $factory;
    }

    public function all(): array
    {
        return $this->products;
    }

    public function find(int $id): array
    {
        if(!isset($this->products[$id])) {
            throw new ProductNotFoundException("Product with id $id not found");
        }

        // return $this->factory->make();
        return [];
    }
}