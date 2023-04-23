<?php

declare(strict_types=1);

namespace Src\BoundedContext\Product\Application;

use Src\BoundedContext\Product\Domain\Contracts\ProductRepositoryContract;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductId;

final class DeleteProductUseCase
{
    private $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $productId): void
    {
        $id = new ProductId($productId);

        $this->repository->delete($id);
    }
}
