<?php


declare(strict_types=1);

namespace Src\BoundedContext\Cart\Application;

use Src\BoundedContext\Cart\Domain\Contracts\CartRepositoryContract;
use Src\BoundedContext\Cart\Domain\Cart;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartId;

final class GetCartUseCase
{
    private $repository;

    public function __construct(CartRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $cartId): ?Cart
    {
        $id = new CartId($cartId);

        $cart = $this->repository->find($id);

        return $cart;
    }
}
