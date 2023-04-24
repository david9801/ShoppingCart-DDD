<?php

declare(strict_types=1);

namespace Src\BoundedContext\Product\Application;

use Src\BoundedContext\Product\Domain\Contracts\ProductRepositoryContract;
use Src\BoundedContext\Product\Domain\Product;

final class GetAllProductUseCase
{
    private $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Product[]
     */
    public function __invoke(): array
    {
        return $this->repository->findAll();
    }
}
