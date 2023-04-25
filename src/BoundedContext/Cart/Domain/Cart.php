<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Domain;

use Src\BoundedContext\Cart\Domain\ValueObjects\CartQuantity;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartPrice;

final class Cart
{
    private $price;
    private $quantity;

    public function __construct(
        CartQuantity $quantity,
        CartPrice $price
    )
    {
        $this->quantity       = $quantity;
        $this->price             = $price;
    }

    public function quantity(): CartQuantity
    {
        return $this->quantity;
    }

    public function price(): CartPrice
    {
        return $this->price;
    }

    public static function create(
        CartQuantity $quantity,
        CartPrice  $price
    ): Cart
    {
        $cart = new self($quantity, $price);

        return $cart;
    }
}
