<?php


declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Application;

use Src\BoundedContext\CartItem\Domain\Contracts\CartItemRepositoryContract;
use Src\BoundedContext\CartItem\Domain\CartItem;
use Src\BoundedContext\CartItem\Domain\ValueObjects\CartItemId;

final class GetCartItemUseCase
{
    private $repository;

    public function __construct(CartItemRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $cartItemId): ?CartItem
    {
        $id = new CartItemId($cartItemId);

        $cartitem = $this->repository->find($id);

        return $cartitem;
    }
}
