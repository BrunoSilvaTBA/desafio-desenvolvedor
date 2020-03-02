<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = ['user_id','status_id','price'];

    public function items()
    {
        return $this->hasMany('App\OrderItem','purchase_request_id','id');
    }
}
