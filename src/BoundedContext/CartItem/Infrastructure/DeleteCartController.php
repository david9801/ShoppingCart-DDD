<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\Cart\Application\DeleteCartUseCase;
use Src\BoundedContext\Cart\Infrastructure\Repositories\EloquentCartRepository;

final class DeleteCartController
{
    private $repository;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $cartId = (int)$request->id;

        $deleteCartUseCase = new DeleteCartUseCase($this->repository);
        $deleteCartUseCase->__invoke($cartId);
    }
}

