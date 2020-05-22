<?php

namespace Alura\Banco\Modelo\Funcionario;

class Desenvolvedor extends Funcionario {

    // Getters
    
    // Actions
        public function sobeNivel() {
            $this->recebeAumento($this->getSalario() * 0.75);
        }
}