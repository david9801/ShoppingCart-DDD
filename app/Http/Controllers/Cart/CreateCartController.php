<?php

namespace App\Http\Controllers\Cart;

use App\Http\Resources\CartResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CreateCartController extends Controller
{
    /**
     * @var \Src\BoundedContext\Cart\Infrastructure\CreateCartController
     */
    private $createCartController;

    public function __construct(\Src\BoundedContext\Cart\Infrastructure\CreateCartController $createCartController)
    {
        $this->createCartController = $createCartController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $newCart = new CartResource($this->createCartController->__invoke($request));

        return response($newCart, 201);
    }
}
