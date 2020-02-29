<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return datatables()->collection(Product::all())->toJson();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->only(['name_product', 'price', 'description']);
        return Product::create($input);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        $input = $request->only(['name_product', 'price', 'description']);
        $product->update($input);
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }
}
