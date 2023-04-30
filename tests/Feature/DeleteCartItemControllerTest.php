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
        $product = Product::create([
            'name' => 'productoTest',
            'price' => 10,
        ]);

        $cart = new Cart();
        $cart->status_id = 1;
        $cart->save();

        $cartItem = new CartItem();
        $cartItem->quantity = 3;
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->save();
        //dd($cartItem->id);
        $response = $this->delete(route('cart-delete'), [
            'cart_item_id' => $cartItem->id
        ]);

        $response->assertRedirect(route('show-shopping-cart'));
        /*
        $this->assertDatabaseMissing('cart_items', [
            'id' => $cartItem->id
        ]);
        */
        $cartItem = $cart->items()->where('product_id', $product->id)->first();
        $this->assertEquals(2, $cartItem->quantity);
    }

}
