<?php

namespace App\Http\Controllers\Product;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
class GetAllProductController extends Controller
{
    /**
     * @var \Src\BoundedContext\Product\Infrastructure\GetAllProductController
     */
    private $getAllProductController;

    public function __construct(\Src\BoundedContext\Product\Infrastructure\GetAllProductController $getAllProductController)
    {
        $this->getAllProductController = $getAllProductController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products = $this->getAllProductController->__invoke($request);

        return response(ProductResource::collection($products), 200);
    }
    public function index()
    {
        $products = Product::all();
        $productsArray = $products->toArray();
        // dd($productsArray);
        return view('products.index', compact('productsArray'));
    }

}
