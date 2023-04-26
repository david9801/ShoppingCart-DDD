<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\Cart\Application\GetCartUseCase;
use Src\BoundedContext\Cart\Infrastructure\Repositories\EloquentCartRepository;
final class GetCartController
{
    private $repository;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $productId = (int)$request->id;
        $getCartUseCase = new GetCartUseCase($this->repository);
        $cart           = $getCartUseCase->__invoke($productId);

        return $cart;
    }
}
