<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Domain\Contracts;

use Src\BoundedContext\Cart\Domain\Cart;
use Src\BoundedContext\Cart\Domain\ValueObjects\CartId;

interface CartRepositoryContract
{
    public function find(CartId $id): ?Cart;

    public function save(Cart $cart): void;

    public function delete(CartId $id): void;


}
