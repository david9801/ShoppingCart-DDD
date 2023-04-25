<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Domain\ValueObjects;

final class CartPrice
{
    private $value;

    public function __construct(float $price)
    {
        $this->value = $price;
    }

    public function value(): float
    {
        return $this->value;
    }
}

