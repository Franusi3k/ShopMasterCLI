<?php

namespace App\Modules\Product\Repositories;

use App\Modules\Product\Exceptions\ProductNotFoundException;
use App\Modules\Product\Models\Product;

class ProductRepository
{
    private array $products;
    private string $path = 'storage/products.json';

    public function __construct()
    {
        if (!file_exists($this->path)) {
            $this->products = [];
            return;
        }

        $json = file_get_contents($this->path);
        $this->products = json_decode($json, true) ?? [];
    }

    private function nextId(): int
    {
        if (empty($this->products)) {
            return 1;
        }

        $ids = array_column($this->products, 'id');
        return max($ids) + 1;
    }

    public function all(): array
    {
        return $this->products;
    }

    public function find(int $id): array
    {
        if (!isset($this->products[$id])) {
            throw new ProductNotFoundException("Product with id $id not found");
        }

        return $this->products[$id];
    }

    public function save(Product $product): void
    {
        $this->products[] = [
            'id' => $this->nextId(),
            'name' => $product->name,
            'quantity' => $product->quantity,
            'price' => $product->price,
            'description' => $product->description ?? null
        ];

        file_put_contents(
            $this->path,
            json_encode(['products' => $this->products], JSON_PRETTY_PRINT)
        );
    }
}
