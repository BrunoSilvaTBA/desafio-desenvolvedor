<?php

namespace App\Http\Controllers;

use App\OrderItem;
use App\Product;
use App\PurchaseRequest;
use App\PurchaseStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Pedidos de compras
 * */
class PurchaseRequestController extends Controller
{

    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware('auth:api');
    }

    //metodo responsável em retornar todos os pedidos do usuário autenticado
    public function index()
    {
        return datatables()->collection($this->user->shopping()->with('items')->get())->toJson();
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Product $product)
    {
        //criando/buscando registro de pedido de compra
        $purchaseRequests = PurchaseRequest::firstOrCreate(
            [
                'user_id' => $this->user->id,
                'status_id' => PurchaseStatus::MY_CART
            ],
            [
                'price' => 0
            ]
        );

        //adiciona item no carrinho
        $items = OrderItem::addItemToCart($request, $purchaseRequests, $product);

        //atualizando valor total do pedido da compra
        $purchaseRequests->increment('price', $items->price * $request->quantity);

        return $purchaseRequests->where('user_id', $this->user->id)->with('items')->first();
    }

    public function show(PurchaseRequest $purchaseRequests)
    {
        return $purchaseRequests;
    }

    public function edit(PurchaseRequest $purchaseRequests)
    {
        //
    }

    public function update(Request $request, PurchaseRequest $purchaseRequests)
    {
        //
    }

    public function destroy(PurchaseRequest $purchaserequest)
    {
        $purchaserequest->delete();
    }
}
