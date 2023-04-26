<?php

declare(strict_types=1);

namespace Src\BoundedContext\CartItem\Domain\Contracts;

use Src\BoundedContext\CartItem\Domain\CartItem;
use Src\BoundedContext\CartItem\Domain\ValueObjects\CartItemId;

interface CartItemRepositoryContract
{
    public function find(CartItemId $id): ?CartItem;

    public function save(CartItem $cart): void;

    public function delete(CartItemId $id): void;


}
