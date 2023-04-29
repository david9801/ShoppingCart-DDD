<?php


namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CartItem extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    //si no extiende Authenticatable no se puede usar sus relaciones en los controllers
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart_id','quantity','product_id'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
