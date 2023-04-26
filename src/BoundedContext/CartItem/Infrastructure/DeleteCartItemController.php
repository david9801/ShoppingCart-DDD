<?php

declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\CartItem\Application\DeleteCartItemUseCase;
use Src\BoundedContext\CartItem\Infrastructure\Repositories\EloquentCartItemRepository;

final class DeleteCartItemController
{
    private $repository;

    public function __construct(EloquentCartItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $cartItemId = (int)$request->id;

        $deleteCartItemUseCase = new DeleteCartItemUseCase($this->repository);
        $deleteCartItemUseCase->__invoke($cartItemId);
    }
}

