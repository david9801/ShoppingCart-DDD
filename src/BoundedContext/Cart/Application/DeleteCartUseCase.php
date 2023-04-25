<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Application;

use Src\BoundedContext\Cart\Domain\Contracts\CartRepositoryContract;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartId;

final class DeleteCartUseCase
{
    private $repository;

    public function __construct(CartRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $cartId): void
    {
        $id = new CartId($cartId);

        $this->repository->delete($id);
    }
}
