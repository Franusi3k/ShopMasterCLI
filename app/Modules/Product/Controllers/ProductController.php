<?php

namespace App\Modules\Product\Controllers;

use App\Modules\Product\Actions\ListProductsAction;
use App\Modules\Product\Actions\ShowProductAction;
use App\Modules\Product\Models\Product;

class ProductController
{
    public function __construct(
        private ListProductsAction $listAction,
        private ShowProductAction $showAction
    ) {}

    public function index(): void
    {
        echo $this->listAction->execute();
    }

    public function show(int $id): void
    {
        echo $this->showAction->execute($id);
    }
}
