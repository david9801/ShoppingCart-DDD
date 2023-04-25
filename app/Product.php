<?php


namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Product extends Authenticatable
{

    //al no extender un model (para desacoplar el proyecto ==ddd) para ejecutar los seeders necesitamos que extienda
    //de authenticable, que tiene el metodo create / updateOrCreate
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price',
    ];

}
