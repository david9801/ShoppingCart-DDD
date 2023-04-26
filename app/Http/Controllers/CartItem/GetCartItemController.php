<?php

namespace App\Http\Controllers\CartItem;

use App\Http\Resources\CartIResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

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
}
