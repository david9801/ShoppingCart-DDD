<?php

declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Domain;

use Src\BoundedContext\CartItem\Domain\ValueObjects\CartItemQuantity;

final class CartItem
{
    private $quantity;

    public function __construct(
        CartItemQuantity $quantity
    )
    {
        $this->quantity              = $quantity;
    }

    public function quantity(): CartItemQuantity
    {
        return $this->quantity;
    }

    public static function create(
        CartItemQuantity $quantity
    ): CartItem
    {
        $cartitem = new self($quantity);

        return $cartitem;
    }
}
