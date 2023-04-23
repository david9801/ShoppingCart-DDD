<?php

namespace App\Http\Controllers\Product;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateProductController extends Controller
{
    /**
     * @var \Src\BoundedContext\Product\Infrastructure\CreateProductController
     */
    private $createProductController;

    public function __construct(\Src\BoundedContext\Product\Infrastructure\CreateProductController $createProductController)
    {
        $this->createProductController = $createProductController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $newProduct = new ProductResource($this->createProductController->__invoke($request));

        return response($newProduct, 201);
    }
}
