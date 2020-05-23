<?php

namespace Alura\Banco\Modelo\Funcionario;

class Diretor extends Funcionario {

    // Getters
    
    // Actions
        public function calcBonificacao(): float {
            return $this->getSalario() * 2;
        }

        public function podeAutenticar(string $senha): bool {
            return ($senha === '1234');
        }
}