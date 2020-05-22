<?php

namespace Alura\Banco\Modelo\Funcionario;

class Gerente extends Funcionario {

    // Getters
    
    // Actions
        public function calcBonificacao(): float {
            return $this->getSalario();
        }
}