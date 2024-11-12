<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\GetProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private int $productsPerPage = 5;

    public function getProducts(GetProductsRequest $request)
    {
        $limit = $request->query('limit') ?? $this->productsPerPage;

        $products = Product::paginate($limit);

        if (!$products) {
            abort(500);
        }

        return [
            'products' => $products
        ];
    }
}
