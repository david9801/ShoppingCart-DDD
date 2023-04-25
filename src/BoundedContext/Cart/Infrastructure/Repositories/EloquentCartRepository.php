<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Infrastructure\Repositories;

use App\Cart as EloquentCartModel;
use Src\BoundedContext\Cart\Domain\Contracts\CartRepositoryContract;
use Src\BoundedContext\Cart\Domain\Cart;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartId;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartPrice;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartQuantity;


final class EloquentCartRepository implements CartRepositoryContract
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
            new CartQuantity($cart->quantity),
            new CartPrice($cart->price)
        );
    }

    public function save(Cart $cart): void
    {
        $newCart = $this->eloquentCartModel;

        $data = [
            'quantity'               => $cart->quantity()->value(),
            'price'              => $cart->price()->value(),
        ];

        $newCart->create($data);
    }


    public function delete(CartId $id): void
    {
        $this->eloquentCartModel
            ->findOrFail($id->value())
            ->delete();
    }
}
