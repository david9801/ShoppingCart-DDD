<?php

declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Domain\ValueObjects;

final class CartItemQuantity
{
    private $quantity;

    public function __construct(int $quantity)
    {
        $this->value = $quantity;
    }

    public function value(): int
    {
        return $this->value;
    }
}

