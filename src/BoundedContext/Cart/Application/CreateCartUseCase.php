<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Application;

use Src\BoundedContext\Cart\Domain\Contracts\CartRepositoryContract;
use Src\BoundedContext\Cart\Domain\Cart;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartPrice;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartQuantity;

final class CreateCartUseCase
{
    private $repository;

    public function __construct(CartRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        float $cartPrice,
        int $cartQuantity
    ): void
    {
        $quantity           = new CartQuantity($cartQuantity);
        $price              = new CartPrice($cartPrice);

        $cart = Cart::create($quantity, $price);

        $this->repository->save($cart);
    }
}

