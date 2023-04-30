<?php

namespace App\Http\Controllers\CartItem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Cart;
use App\CartItem;

class DeleteCartItemController extends Controller
{
    /**
     * @var \Src\BoundedContext\CartItem\Infrastructure\DeleteCartItemController
     */
    private $deleteCartItemController;

    public function __construct(\Src\BoundedContext\CartItem\Infrastructure\DeleteCartItemController $deleteCartItemController)
    {
        $this->deleteCartItemController = $deleteCartItemController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $this->deleteCartItemController->__invoke($request);

        return response([], 204);
    }

    public function remove(Request $request)
    {
        $cart = $this->getCart();
        $item = $this->getModel($cart, $request);

        $this->updateCartItemQuantity($item, $request);
        return redirect()->route('show-shopping-cart');
    }

    /**
     * @return mixed
     */
    private function getCart(): Cart
    {
        $cart = Cart::where('status_id', 1)->first();
        return $cart;
    }

    /**
     * @param $cart
     * @param Request $request
     * @return mixed
     */
    private function getModel($cart, Request $request): ?CartItem
    {
        $item = $cart->items()->where('product_id', $request->input('product_id'))->first();
        return $item;
    }

    /**
     * @param $item
     * @param Request $request
     * @return void
     */
    private function updateCartItemQuantity($item, Request $request): void
    {
        if ($item) {
            $removeQuantity = $request->input('remove_quantity');
            $item->quantity -= $removeQuantity;

            $this->deleteOrsave($item);
        }
    }

    /**
     * @param $item
     * @return void
     */
    private function deleteOrsave($item): void
    {
        if ($item->quantity <= 0) {
            $item->delete();
        }
        $item->save();
    }

}
