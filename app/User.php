<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //retorna produtos publicados do usuário autenticado
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    //retorna todos os pedidos de compra do usuário autenticado
    public function shopping()
    {
        return $this->hasMany('App\PurchaseRequest');
    }

    //retornar dados do carrinho de compras
    public function myCart()
    {
        return $this->shopping()->where('status', PurchaseStatus::MY_CART)->first();
    }

    //retorna itens do carrinho de compra
    public function shoppingCartItems()
    {
        $this->myCart();
    }


}
