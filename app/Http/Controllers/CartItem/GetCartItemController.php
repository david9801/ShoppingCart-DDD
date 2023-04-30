<?php

namespace App\Http\Controllers\CartItem;

use App\Http\Resources\CartIResource;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Cart;
class GetCartItemController extends Controller
{
    /**
     * @var \Src\BoundedContext\CartItem\Infrastructure\GetCartItemController
     */
    private $getCartItemController;

    public function __construct(\Src\BoundedContext\CartItem\Infrastructure\GetCartItemController $getCartItemController)


    {
        $this->getCartItemController = $getCartItemController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $cartItem = new cartIResource($this->getCartItemController->__invoke($request));

        return response($cartItem, 200);
    }

    public function show()
    {
        $cart = Cart::where('status_id', 1)->first();

        if (!$cart) {
            return redirect()->route('show-products')->with('status', 'Todavía no has elegido ningún producto.');
        }

        $cartItems = $cart->items()->get()->map->toArrayCart();
        return view('shoppingCart.index', compact('cartItems'));
    }

}

