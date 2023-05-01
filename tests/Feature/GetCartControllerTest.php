<?php


namespace App\BrandPanel\Modules\Store\Tests\Feature;

use Tests\TestCase;
use App\Http\Controllers\CartItem\GetCartController;
use App\Cart;
use App\CartItem;
use App\Product;

class GetCartControllerTest extends TestCase
{
    /** @test */

    public function addQuantityProductTest()
    {
        $product = Product::create([
            'name' => 'productoTestToAddQuantity',
            'price' => 10,
        ]);
        $cart = Cart::where('status_id', 1)->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->status_id = 1;
            $cart->save();
        };
        $cartItem = new CartItem();
        $cartItem->quantity = 2;
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->save();

        $response = $this->post(route('cart-add', ['product' => $product->id]), [
            'quantity' => 1,
        ]);

        $response->assertRedirect(route('show-products'));

        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => 3,
        ]);
    }


}
