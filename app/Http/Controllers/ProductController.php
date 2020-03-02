<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:api');
    }

    //retorna todos os produtos do usuário autenticado
    public function index()
    {
        return datatables()->collection($this->user->products)->toJson();
    }

    public function create()
    {
        //
    }

    public function store(CreatedProductRequest $request)
    {
        $input = $request->only(['name_product', 'price', 'description']);
        $input['user_id'] = $this->user->id;

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

    //alterar produto
    public function update(CreatedProductRequest $request, Product $product)
    {
        Gate::authorize('edit', $product);

        $input = $request->only(['name_product', 'price', 'description']);
        $product->update($input);
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }
}
