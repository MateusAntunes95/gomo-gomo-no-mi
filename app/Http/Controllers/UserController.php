<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\ListarRepository;

class UserController extends Controller
{
    public function index(Request $request, ListarRepository $listarRepository)
    {
        $dados = $listarRepository->listar($request->all())->get();

        return view('user.index')
            ->with(compact('dados'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->saveOrFail();

        return view('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')
            ->with(compact('user'));
    }
}
