<?php

namespace App\Http\Controllers\Cart;

use App\Http\Resources\CartResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Product;
use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Log;
use Src\BoundedContext\CartItem\Domain\ValueObjects\CartItemQuantity;

class GetCartController extends Controller
{
    /**
     * @var \Src\BoundedContext\Cart\Infrastructure\GetCartController
     */
    private $getCartController;

    public function __construct(\Src\BoundedContext\Cart\Infrastructure\GetCartController $getCartController)


    {
        $this->getCartController = $getCartController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $cart = new cartResource($this->getCartController->__invoke($request));

        return response($cart, 200);
    }

    public function add(Request $request, $product)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1|max:50',
        ]);
        $quantity = $validatedData['quantity'];
        $product = Product::findOrFail($product);

        $cart = Cart::where('status_id', 1)->first();

        $cart = $this->createCartIfNotExist($cart);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        $cartItem = $this->createCartItemIfNotExist($cartItem, $cart, $product, $quantity);

        $this->updateCartItem($cartItem, $cart, $product, $quantity);

        return redirect()->route('show-products');
    }

    /**
     * @param $cartItem
     * @param $cart
     * @param $product
     * @param $quantity
     * @return CartItem|null
     */
    private function updateCartItem($cartItem, $cart, $product, $quantity): ?CartItem
    {
        $this->updateCartItemQuantity($cartItem, $quantity);
        return $cartItem;
    }

    /**
     * @param $cartItem
     * @param $quantity
     * @return CartItem|null
     */
    private function updateCartItemQuantity($cartItem, $quantity): ?CartItem
    {
        $cartItem->quantity += $quantity;
        $cartItem->save();
        return $cartItem;
    }

    /**
     * @param $cart
     * @return Cart
     */
    private function createCartIfNotExist($cart): Cart
    {
        if (!$cart) {
            $cart = new Cart;
            $cart->status_id = 1; // 1 es el id del estado "activo"
            $cart->save();
        }
        return $cart;
    }

    /**
     * @param $cartItem
     * @param Cart $cart
     * @param $product
     * @param $quantity
     * @return CartItem
     */
    private function createCartItemIfNotExist($cartItem, Cart $cart, $product, $quantity): CartItem
    {
        if (!$cartItem) {
            $cartItem = new CartItem;
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $product->id;
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }
        return $cartItem;
    }


}
