<?php

namespace App\Http\Controllers\Cart;

use App\Http\Resources\CartResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

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


}
