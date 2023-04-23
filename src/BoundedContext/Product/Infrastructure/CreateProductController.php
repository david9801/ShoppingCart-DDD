<?php

declare(strict_types=1);

namespace Src\BoundedContext\Product\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\Product\Application\CreateProductUseCase;
use Src\BoundedContext\Product\Application\GetProductUseCase;
use Src\BoundedContext\Product\Infrastructure\Repositories\EloquentProductRepository;

final class CreateProductController
{
    private $repository;

    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $productName           = $request->input('name');
        $productDescription    = $request->input('description');
        $productPrice          = $request->input('price');
;
        $createProductUseCase->__invoke(
            $productName,
            $productDescription,
            $productPrice,
        );
            /*
                $getUserByCriteriaUseCase = new GetUserByCriteriaUseCase($this->repository);
                $newProduct                  = $getUserByCriteriaUseCase->__invoke($userName, $userEmail);
            */
        $productId = (int)$request->id;
        $getProductUseCase  = new GetProductUseCase($this->repository);
        $newProduct         = $getProductUseCase->__invoke($productId);

        return $newProduct;
    }
}
