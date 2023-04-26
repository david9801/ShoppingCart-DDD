<?php

declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Infrastructure\Repositories;

use App\Cart as EloquentCartModel;
use Src\BoundedContext\Cart\Domain\Contracts\CartRepositoryContract;
use Src\BoundedContext\Cart\Domain\CartItem;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartId;


final class EloquentCartItemRepository implements CartRepositoryContract
{
    private $eloquentCartModel;

    public function __construct()
    {
        $this->eloquentCartModel = new EloquentCartModel;
    }

    public function find(CartId $id): ?Cart
    {
        $cart = $this->eloquentCartModel->findOrFail($id->value());

        return new Cart(
        );
    }

    public function save(Cart $cart): void
    {
        $newCart = $this->eloquentCartModel;

        $newCart->create();
    }


    public function delete(CartId $id): void
    {
        $this->eloquentCartModel
            ->findOrFail($id->value())
            ->delete();
    }
}
