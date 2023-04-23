<?php

declare(strict_types=1);

namespace Src\BoundedContext\Product\Domain\Contracts;

use Src\BoundedContext\Product\Domain\Product;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductId;

interface ProductRepositoryContract
{
    public function find(ProductId $id): ?Product;

    public function save(Product $product): void;

    public function delete(ProductId $id): void;
}
