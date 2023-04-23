<?php

declare(strict_types=1);

namespace Src\BoundedContext\Product\Domain;

use Src\BoundedContext\Product\Domain\ValueObjects\ProductName;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductDescription;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductPrice;

final class Product
{
    private $name;
    private $description;
    private $price;

    public function __construct(
        ProductName $name,
        ProductDescription $description,
        ProductPrice $price
    )
    {
        $this->name              = $name;
        $this->description       = $description;
        $this->price             = $price;
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function description(): ProductDescription
    {
        return $this->description;
    }

    public function price(): ProductPrice
    {
        return $this->price;
    }

    public static function create(
        ProductName $name,
        ProductDescription $description,
        ProductPrice $price
    ): Product
    {
        $product = new self($name, $description, $price);

        return $product;
    }
}
