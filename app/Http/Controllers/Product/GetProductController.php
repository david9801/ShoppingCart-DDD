<?php

namespace App\Http\Controllers\Product;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetProductController extends Controller
{
    /**
     * @var \Src\BoundedContext\Product\Infrastructure\GetProductController
     */
    private $getProductController;

    public function __construct(\Src\BoundedContext\Product\Infrastructure\GetProductController $getProductController)
    {
        $this->getProductController = $getProductController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $product = new productResource($this->getProductController->__invoke($request));

        return response($product, 200);
    }
}
