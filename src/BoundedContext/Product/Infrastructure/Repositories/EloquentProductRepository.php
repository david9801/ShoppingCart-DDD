<?php

declare(strict_types=1);

namespace Src\BoundedContext\Product\Infrastructure\Repositories;

use App\Product as EloquentProductModel;
use Src\BoundedContext\Product\Domain\Contracts\ProductRepositoryContract;
use Src\BoundedContext\Product\Domain\Product;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductDescription;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductId;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductName;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductPrice;


final class EloquentProductRepository implements ProductRepositoryContract
{
    private $eloquentProductModel;

    public function __construct()
    {
        $this->eloquentProductModel = new EloquentProductModel;
    }

    public function find(ProductId $id): ?Product
    {
        $product = $this->eloquentProductModel->findOrFail($id->value());

        return new Product(
            new ProductName($product->name),
            new ProductDescription($product->description),
            new ProductPrice($product->price)
        );
    }

    public function findAll(): array
    {
        $products = $this->eloquentProductModel->all();

        $result = [];
        foreach ($products as $product) {
            $result[] = new Product(
                new ProductName($product->name),
                new ProductDescription($product->description),
                new ProductPrice($product->price)
            );
        }

        return $result;
    }


    public function save(Product $product): void
        {
            $newProduct = $this->eloquentProductModel;

            $data = [
                'name'               => $product->name()->value(),
                'description'        => $product->description()->value(),
                'price'              => $product->price()->value(),
            ];

            $newProduct->create($data);
        }


    public function delete(ProductId $id): void
    {
        $this->eloquentProductModel
            ->findOrFail($id->value())
            ->delete();
    }
}
