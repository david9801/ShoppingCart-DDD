<?php

namespace App\Http\Controllers\CartItem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class DeleteCartItemController extends Controller
{
    /**
     * @var \Src\BoundedContext\CartItem\Infrastructure\DeleteCartItemController
     */
    private $deleteCartItemController;

    public function __construct(\Src\BoundedContext\Cart\Infrastructure\DeleteCartItemController $deleteCartItemController)
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
}
