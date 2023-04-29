<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/productshow', [\App\Http\Controllers\Product\GetAllProductController::class, 'index'])->name('show-products');
Route::post('cart/add/{product}',[ \App\Http\Controllers\Cart\GetCartController::class, 'add'])->name('cart.add');
