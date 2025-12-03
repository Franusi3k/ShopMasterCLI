<?php

namespace App\Modules\Product\Controllers;

use App\Modules\Product\Actions\CreateProductAction;
use App\Modules\Product\Actions\ListProductsAction;
use App\Modules\Product\Actions\ShowProductAction;

class ProductController
{
    public function __construct(
        private ListProductsAction $listAction,
        private ShowProductAction $showAction,
        private CreateProductAction $createAction
    ) {}

    public function index(): void
    {
        echo $this->listAction->execute();
    }

    public function show(int $id): void
    {
        echo $this->showAction->execute($id);
    }

    public function create(): void
    {
        $data = ['id' => 1, 'name' => 'HAHAHA', 'quantity' => 5, 'price' => 17.99, 'description' => "rasdas"]; //test data

        echo $this->createAction->execute($data);
    }
}
