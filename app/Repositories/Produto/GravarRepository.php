<?php

namespace App\Repositories\Produto;

use Exception;
use App\Models\Produto;

class GravarRepository
{
    private $dados;
    private $produto;
    private $produtoId;

    public function criaOuAtualiza(array $dados, $id = NULL): bool
    {
        $this->dados = $dados;
        $this->produtoId = $id;

        try {
            $this->produto = produto::findOrNew($this->produtoId);
            $this->produto->fill($this->dados);
            $this->produto->saveOrFail();
        } catch (Exception $ex) {
            $this->error = $ex->getmessage();
            return false;
        }

        return true;
    }
}
