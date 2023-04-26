<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\Cart\Application\GetCartUseCase;
use Src\BoundedContext\Cart\Infrastructure\Repositories\EloquentCartRepository;

final class CreateCartController
{
    private $repository;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {

        ;
        $createCartUseCase->__invoke();

        $cartId = (int)$request->id;
        $getCartUseCase  = new GetCartUseCase($this->repository);
        $newCart         = $getCartUseCase->__invoke($cartId);

        return $newCart;
    }
}
