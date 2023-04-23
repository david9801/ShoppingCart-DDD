<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteProductController extends Controller
{
    /**
     * @var \Src\BoundedContext\Product\Infrastructure\DeleteProductController
     */
    private $deleteProductController;

    public function __construct(\Src\BoundedContext\Product\Infrastructure\DeleteProductController $deleteProductController)
    {
        $this->deleteProductController = $deleteProductController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->deleteProductController->__invoke($request);

        return response([], 204);
    }
}
