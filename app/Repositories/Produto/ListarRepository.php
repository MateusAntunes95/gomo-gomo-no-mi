<?php

namespace App\Repositories\Produto;

use App\Models\Produto;


class ListarRepository
{
    private $dados;
    private $query;

    public function listar(array $dados)
    {
        $this->dados = $dados;
        $this->query = Produto::query();
        $this->select();
        $this->filter();

        return $this->query;
    }

    private function select()
    {
        $this->query->select([
            'id',
            'nome',
            'preco',
        ]);
    }

    private function filter()
    {
        if (!empty($this->dados['nome'])) {
            $this->query->where('nome', 'LIKE', '%' . $this->dados['nome'] . '%');
        }

        if (!empty($this->dados['preco'])) {
            $this->query->where('preco', 'LIKE', '%' . $this->dados['preco'] . '%');
        }

        if (!empty($this->dados['id'])) {
            $this->query->where('id', $this->dados['id']);
        }
    }
}
