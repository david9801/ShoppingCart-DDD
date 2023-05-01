<?php

namespace App\BrandPanel\Modules\Store\Tests\Feature;

use Tests\TestCase;
use App\Http\Controllers\CartItem\DeleteCartItemController;
use App\Cart;
use App\CartItem;
use App\Product;
class DeleteCartItemControllerTest extends TestCase
{
    /** @test */

    public function removeTest()
    {
        //probamos a crear 3 unidades de un product test y a eliminar 2 uds, para comprobar si queda 1 ud en el carrito
        $product = Product::create([
            'name' => 'productoTest',
            'price' => 10,
        ]);
        //buscamos la primera cart, si no existe la creamos
        $cart = Cart::where('status_id', 1)->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->status_id = 1;
            $cart->save();
        };
        //creamos la interaccion
        $cartItem = new CartItem();
        $cartItem->quantity = 3;
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->save();
       // dd($cartItem->quantity);
        $response = $this->delete(route('cart-delete'), [
            'product_id' => $cartItem->product_id,
            'remove_quantity' => 2,
            'cart_id' => $cart->id,
        ]);
        $response->assertRedirect(route('show-shopping-cart'));
        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

    }
    public function removeAllTest()
    {
        //probamos a añadir una unidad de un product test y a eliminarla
        $product = Product::create([
            'name' => 'productoTestDeleteALl',
            'price' => 10,
        ]);
        $cart = Cart::where('status_id', 1)->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->status_id = 1;
            $cart->save();
        };
        $cartItem = new CartItem();
        $cartItem->quantity = 1;
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->save();
        $response = $this->delete(route('cart-delete'), [
            'product_id' => $cartItem->product_id,
            'remove_quantity' => $cartItem->quantity,
            'cart_id' => $cart->id,
        ]);
        $response->assertRedirect(route('show-shopping-cart'));
        $this->assertDatabaseMissing('cart_items', [
            'cart_id' => $cart->id,
            'product_id' => $product->id,
        ]);
    }


}
