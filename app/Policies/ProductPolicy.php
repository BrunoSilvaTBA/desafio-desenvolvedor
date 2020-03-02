<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Product $product)
    {
        return $user->id == $product->user_id;
    }

    public function delete(User $user, Product $product)
    {
        return $user->id == $product->user_id;
    }
}
