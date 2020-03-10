<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedUserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
       $this->middleware('auth:api')->except(['store']);
    }

    //Lista de usuarios
    public function index(User $user)
    {
        return datatables($user->all())->toJson();
    }

    //página de novo usuário
    public function create(Request $request)
    {

    }

    //metodo responsável em registrar novo usuário
    public function store(CreatedUserRequest $request)
    {
        $input = $request->only(['name', 'email', 'password', 'password_confirmation']);
        $input['password'] = bcrypt($input['password']);

        return User::create($input);
    }

    //metodo responsável em exibir dados do usuário autenticado
    public function show()
    {
        return $this->user;
    }

    public function edit(User $product)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $input = $request->only(['name', 'email', 'password']);

        if ($request->has('password')) {
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
