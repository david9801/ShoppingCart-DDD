<?php

declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Infrastructure\Repositories;

use App\CartItem as EloquentCartItemModel;
use Src\BoundedContext\CartItem\Domain\Contracts\CartItemRepositoryContract;
use Src\BoundedContext\CartItem\Domain\CartItem;
use Src\BoundedContext\CartItem\Domain\ValueObjects\CartItemId;
use Src\BoundedContext\CartItem\Domain\ValueObjects\CartItemQuantity;


final class EloquentCartItemRepository implements CartItemRepositoryContract
{
    private $eloquentCartItemModel;

    public function __construct()
    {
        $this->eloquentCartItemModel = new EloquentCartItemModel;
    }

    public function find(CartItemId $id): ?CartItem
    {
        $cartitem = $this->eloquentCartItemModel->findOrFail($id->value());

        return new CartItem(
            new CartItemQuantity($cartitem->quantity),
        );
    }



    public function save(CartItem $cartitem): void
    {
        $newCartItem = $this->eloquentCartItemModel;

        $data = [
            'quantity'  => $cartitem->quantity()->value(),
        ];

        $newCartItem->create($data);
    }


    public function delete(CartItemId $id): void
    {
        $this->eloquentCartItemModel
            ->findOrFail($id->value())
            ->delete();
    }
}
