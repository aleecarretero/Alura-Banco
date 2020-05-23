<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Autenticavel;

class Gerente extends Funcionario implements Autenticavel {

    // Getters
    
    // Actions
        public function calcBonificacao(): float {
            return $this->getSalario();
        }

        public function podeAutenticar(string $senha): bool
        {
            return $senha === '4321';
        }
}