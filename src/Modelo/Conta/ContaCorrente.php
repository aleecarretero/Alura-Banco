<?php

namespace Alura\Banco\Modelo\Conta;

class ContaCorrente extends Conta {

    public function getPercentTarifa(): float{
        return 0.05;
    }

    // Transactions
        public function transferir(float $valorATransferir, Conta $contaDestino): void {
            if ($valorATransferir > $this->saldo){
                echo 'Saldo indisponível';
            } else {
                $this->sacar($valorATransferir);
                $contaDestino->depositar($valorATransferir);
            }
        }
}