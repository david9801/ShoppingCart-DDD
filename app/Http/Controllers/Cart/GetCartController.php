<?php

namespace App\Http\Controllers\Cart;

use App\Http\Resources\CartResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Product;
use App\Cart;
use App\CartItem;

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
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        // Buscar el producto por su id
        $product = Product::findOrFail($productId);

        // Obtener el carrito de la compra actual del usuario
        $cart = Cart::where('status_id', 1)->first();

        // Si no hay un carrito de la compra activo, crear uno nuevo
        if (!$cart) {
            $cart = new Cart;
            $cart->status_id = 1; // 1 es el id del estado "activo"
            $cart->save();
        }

        // Buscar si ya existe el producto en el carrito de la compra
        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

        // Si el producto ya existe, incrementar la cantidad
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else { // Si el producto no existe, crear un nuevo ítem en el carrito
            $cartItem = new CartItem;
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $product->id;
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return redirect()->route('show-products');
    }


}
