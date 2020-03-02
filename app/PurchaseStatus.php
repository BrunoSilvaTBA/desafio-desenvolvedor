<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseStatus extends Model
{
    const MY_CART = 1;
    const OPENED = 2;
    const PAID_OUT = 3;
    const CANCELED = 4;

    protected $fillable = ['name_status'];
}
