<?php

declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\CartItem\Application\GetCartItemUseCase;
use Src\BoundedContext\CartItem\Infrastructure\Repositories\EloquentCartItemRepository;
final class GetCartItemController
{
    private $repository;

    public function __construct(EloquentCartItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $cartItemId = (int)$request->id;
        $getCartItemUseCase = new GetCartItemUseCase($this->repository);
        $cartitem           = $getCartItemUseCase->__invoke($cartItemId);

        return $cartitem;
    }
}
