<?php

declare(strict_types=1);

namespace Src\BoundedContext\Product\Application;

use Src\BoundedContext\Product\Domain\Contracts\ProductRepositoryContract;
use Src\BoundedContext\Product\Domain\Product;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductId;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductName;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductDescription;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductPrice;

final class CreateProductUseCase
{
    private $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $productName,
        ?string $productDescription,
        float $productPrice
    ): void
    {
        $name               = new ProductName($productName);
        $description        = new ProductDescription($productDescription);
        $price              = new ProductPrice($productPrice);

        $product = Product::create($name, $description, $price);

        $this->repository->save($product);
    }
}

