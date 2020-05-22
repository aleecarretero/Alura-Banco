<?php

namespace Alura\Banco\Modelo\Conta;

class ContaPoupanca extends Conta {
    public function getPercentTarifa(): float{
        return 0.03;
    }

}