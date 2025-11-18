<?php

namespace App\Modules\Product\Controllers;

use App\Modules\Product\Action\ListProductsAction;

class ProductController
{
    public function __construct(
        private ListProductsAction $listAction
    ) {}

    public function index(): void
    {
        echo $this->listAction->execute();
    }
}
