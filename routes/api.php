<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user/{id}', 'User\GetUserController');
Route::post('user', 'User\CreateUserController');
Route::put('user/{id}', 'User\UpdateUserController');
Route::delete('user/{id}', 'User\DeleteUserController');

Route::middleware('auth:api')->get('/product', function (Request $request) {
    return $request->product();
});
Route::get('product/{id}', 'Product\GetProductController');
Route::post('product', 'Product\CreateProductController');
Route::delete('product/{id}', 'Product\DeleteProductController');
Route::get('products', 'Product\GetAllProductController')->name('show-products');
