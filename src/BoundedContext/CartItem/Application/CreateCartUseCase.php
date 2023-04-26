<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Application;

use Src\BoundedContext\Cart\Domain\Contracts\CartRepositoryContract;
use Src\BoundedContext\Cart\Domain\Cart;

final class CreateCargfhtUseCase
{
    private $repository;

    public function __construct(CartRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): void
    {
        $cart = Cart::create();

        $this->repository->save($cart);
    }
}

