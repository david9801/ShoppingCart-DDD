<?php


namespace App;

use Illuminate\Notifications\Notifiable;

class CartItem
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

}
