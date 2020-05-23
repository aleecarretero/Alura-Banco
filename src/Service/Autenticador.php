<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Diretor;

class Autenticador {
    public function logIn(Autenticavel $diretor, string $senha): void {
        if ($diretor->podeAutenticar($senha)){
            echo (
                HORIZONTAL_SEPARATOR .
                $diretor->getNome() . ' ' .
                'logado com sucesso'
            );
        } else {
            echo 'Senha incorreta!';
        }
    }
}