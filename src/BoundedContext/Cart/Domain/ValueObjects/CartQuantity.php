<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Domain\ValueObjects;

final class CartQuantity
{
    private $value;

    public function __construct(int $quantity)
    {
        $this->value = $quantity;
    }

    public function value(): float
    {
        return $this->value;
    }
}

