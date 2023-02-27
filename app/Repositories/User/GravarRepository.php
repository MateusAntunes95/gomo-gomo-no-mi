<?php

namespace App\Repositories\User;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GravarRepository
{
    private $dados;
    private $user;
    private $userId;

    public function criaOuAtualiza(array $dados, $id = NULL): bool
    {
        $this->dados = $dados;
        $this->userId = $id;

        try {
            $this->user = User::findOrNew($this->userId);
            $this->user->fill($this->dados);
            $this->user->password = Hash::make($this->dados['password']);
            $this->user->saveOrFail();
        } catch (Exception $ex) {
            $this->error = $ex->getmessage();
            return false;
        }

        return true;
    }
}
