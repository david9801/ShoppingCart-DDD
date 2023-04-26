<?php

declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\CartItem\Application\GetCartItemUseCase;
use Src\BoundedContext\CartItem\Infrastructure\Repositories\EloquentCartItemRepository;

final class CreateCartItemController
{
    private $repository;

    public function __construct(EloquentCartItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $cartItemQuantity           = $request->input('quantity');

        $createCartItemUseCase->__invoke(
            $cartItemQuantity
        );

        $cartItemId = (int)$request->id;
        $getCartItemUseCase  = new GetCartItemUseCase($this->repository);
        $newCartItem         = $getCartItemUseCase->__invoke($cartItemId);

        return $newCartItem;
    }
}
