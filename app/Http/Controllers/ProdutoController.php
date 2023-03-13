<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Models\Produto;
use App\Repositories\Produto\GravarRepository;
use App\Repositories\Produto\ListarRepository;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request, ListarRepository $listarRepository)
    {
        $dados = $listarRepository->listar($request->all())->get();

        return view('produto.index')
            ->with(compact('dados'));
    }

    public function create()
    {
        info('teste');
        return view('produto.create');
    }


    public function store(StoreProdutoRequest $request, GravarRepository $gravarRepository)
    {
        info('entrou aq');
        if (!$gravarRepository->criaOuAtualiza($request->all())) {
            return redirect()->back()->withErrors('Error ao salvar produto.');
        }

        return redirect()->route('produto.index');
    }

    public function edit(Produto $produto)
    {
        return view('produto.edit')
            ->with(compact('produto'));
    }

    public function update(StoreProdutoRequest $request, Produto $produto, GravarRepository $gravarRepository)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
       $produto->delete();

       return redirect()->route('produto.index');
    }
}
