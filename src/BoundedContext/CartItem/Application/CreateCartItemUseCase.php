<?php

declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Application;

use Src\BoundedContext\CartItem\Domain\Contracts\CartItemRepositoryContract;
use Src\BoundedContext\CartItem\Domain\CartItem;
use Src\BoundedContext\CartItem\Domain\ValueObjects\CartItemQuantity;

final class CreateCartItemUseCase
{
    private $repository;

    public function __construct(CartItemRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        ?Int $cartItemQuantity

    ): void
    {
        $quantity               = new CartItemQuantity($cartItemQuantity);

        $cartitem = CartItem::create($quantity);

        $this->repository->save($cartitem);
    }
}

