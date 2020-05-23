<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Autenticavel;
use Alura\Banco\Modelo\Funcionario\Diretor;

class Autenticador {
    public function logIn(Autenticavel $autenticavel, string $senha): void {
        if ($autenticavel->podeAutenticar($senha)){
            echo (
                HORIZONTAL_SEPARATOR .
                'Logado com sucesso'
            );
        } else {
            echo 'Senha incorreta!';
        }
    }
}