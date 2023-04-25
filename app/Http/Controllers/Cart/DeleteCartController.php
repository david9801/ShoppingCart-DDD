<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class DeleteCartController extends Controller
{
    /**
     * @var \Src\BoundedContext\Cart\Infrastructure\DeleteCartController
     */
    private $deleteCartController;

    public function __construct(\Src\BoundedContext\Cart\Infrastructure\DeleteCartController $deleteCartController)
    {
        $this->deleteCartController = $deleteCartController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $this->deleteCartController->__invoke($request);

        return response([], 204);
    }
}
