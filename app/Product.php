<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Product extends Model
{
    use SoftDeletes;

    protected $casts = [
        'price' => 'double'
    ];

    protected $fillable = ['name_product', 'description', 'price', 'user_id'];
}
