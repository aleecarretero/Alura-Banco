<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Funcionario;

class ControladorBonificacoes {

    private float $totalBonificacoes = 0;

    // Getters
        public function getTotalBonificacoes(): float {
            return $this->totalBonificacoes;
        }

    // Actions
        public function addBonificacao(Funcionario $funcionario) {
            $this->totalBonificacoes += $funcionario->calcBonificacao();
        }
}