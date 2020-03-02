<?php

namespace App;

use App\Events\OrderItemEvent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderItem extends Model
{
    protected $fillable = ['purchase_request_id', 'price', 'quantity', 'product_id'];

    //metodo responsável em adicionar item dentro do pedido de compra
    public static function addItemToCart(Request $request, PurchaseRequest $purchaseRequests, Product $product)
    {
        $find = [
            'purchase_request_id' => $purchaseRequests->id,
            'product_id' => $product->id,
        ];

        $data = [
            'price' => $product->price,
            'quantity' => 0,
        ];

        $orderItems = self::firstOrCreate($find, $data);

        //atualizando a quantidade de itens no carrinho
        $orderItems->increment('quantity', $request->quantity);

        return $orderItems;
    }

    public function purchaseRequest()
    {
        return $this->belongsTo('App\PurchaseRequest');
    }
}
