<?php

declare(strict_types=1);

namespace Src\BoundedContext\Product\Domain\ValueObjects;

final class ProductName
{
    private $value;

    public function __construct(string $name)
    {
        $this->value = $name;
    }

    public function value(): string
    {
        return $this->value;
    }
}
