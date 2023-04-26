<?php

namespace App\Http\Controllers\CartItem;

use App\Http\Resources\CartIResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CreateCartItemController extends Controller
{
    /**
     * @var \Src\BoundedContext\Cart\Infrastructure\CreateCartController
     */
    private $createCartItemController;

    public function __construct(\Src\BoundedContext\CartItem\Infrastructure\CreateCartItemController $createCartItemController)
    {
        $this->createCartItemController = $createCartItemController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $newCart = new CartIResource($this->createCartItemController->__invoke($request));

        return response($newCart, 201);
    }
}
