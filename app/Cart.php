<?php


namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cart extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_id'
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function status()
    {
        return $this->belongsTo(CartStatus::class);
    }

}
