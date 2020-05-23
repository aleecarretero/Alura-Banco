<?php

namespace Alura\Banco\Modelo\Funcionario;

class EditorVideo extends Funcionario{
    public function calcBonificacao(): float {
        return 600;
    }
}