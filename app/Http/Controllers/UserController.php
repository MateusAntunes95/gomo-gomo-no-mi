<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Repositories\User\GravarRepository;
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

    public function store(StoreUserRequest $request, GravarRepository $gravarRepository)
    {
        if (!$gravarRepository->criaOuAtualiza($request->all())) {
            return redirect()->back()->withErrors('Error ao salvar usuario.');
        }

        return view('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')
            ->with(compact('user'));
    }

    public function update($id, GravarRepository $gravarRepository, StoreUserRequest $request)
    {
        if (!$gravarRepository->criaOuAtualiza($request->all(), $id)) {
            return redirect()->back()->withErrors('Error ao editar usuario.');
        }

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuário removido com sucesso!');
    }
}
