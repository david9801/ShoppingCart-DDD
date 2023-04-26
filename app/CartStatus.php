<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;


class CartStatus extends Authenticatable
{

    //al no extender un model (para desacoplar el proyecto ==ddd) para ejecutar los seeders necesitamos que extienda
    //de authenticable, que tiene el metodo create / updateOrCreate
    public $timestamps = false;

    const IN_PROGRESS = 1;
    const PAYMENT_SUCCESSFUL = 2;
    const PAYMENT_ERROR = 3;
    const ABANDONED = 4;

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
