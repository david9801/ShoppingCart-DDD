<?php

declare(strict_types=1);

namespace Src\BoundedContext\Cart\Domain;


final class Cart
{


    public function __construct()
    {
    }


    public static function create(): Cart
    {
        $cart = new self();

        return $cart;
    }
}
