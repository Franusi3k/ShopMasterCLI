<?php

namespace App\Modules\Product\Models;

use App\Modules\Product\Exceptions\InsuffcientStockException;

class Product
{
    public ?int $id;
    public string $name;
    public int $quantity;
    public float $price;
    public ?string $description;

    public function __construct(?int $id, string $name, int $quantity, float $price, ?string $description = null) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->description = $description;
    }

    public function isAvailable(): bool
    {
        return $this->quantity > 0;
    }

    public function reserve(int $qty): void
    {
        if($this->quantity < $qty) {
            throw new InsuffcientStockException("Not enough stock");
        }

        $this->quantity -= $qty;
    }
}
