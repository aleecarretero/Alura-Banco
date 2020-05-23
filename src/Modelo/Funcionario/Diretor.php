<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Autenticavel;

class Diretor extends Funcionario implements Autenticavel {

    // Getters
    
    // Actions
        public function calcBonificacao(): float {
            return $this->getSalario() * 2;
        }

        public function podeAutenticar(string $senha): bool {
            return ($senha === '1234');
        }
}