<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //Lista de usuarios
    public function index(User $user)
    {
        return  datatables($user->all())->toJson();
    }

    //página de novo usuário
    public function create(Request $request)
    {

    }

    //metodo responsável em registrar novo usuário
    public function store(Request $request)
    {
        $input = $request->only(['name','email','password']);
        $input['password'] = bcrypt($input['password']);

        return User::create($input);
    }

    //metodo responsável em exibir dados de um unico usuário
    public function show(User $user)
    {
        return $user;
    }

    public function edit(User $product)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $input = $request->only(['name','email','password']);

        if( $request->has('password') ) {
            $input['password'] = bcrypt($input['password']);
        }

        $user->update($input);

        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
