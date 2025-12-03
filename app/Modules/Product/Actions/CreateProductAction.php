<?php

namespace App\Modules\Product\Actions;

use App\Modules\Product\Factories\ProductFactory;
use App\Core\Validation\Validator;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Repositories\ProductRepository;
use App\Modules\Product\Validations\CreateProductValidator;

class CreateProductAction
{
    public function __construct(

        private CreateProductValidator $rules,
        private Validator $validator,
        private ProductFactory $factory,
        private ProductRepository $repo

    ) {}

    public function execute(array $data)
    {
        $this->validator->validate($data, $this->rules->rules());

        $product = $this->factory->make($data);

        $this->repo->save($product);

        return "Product was created!";
    }
}
