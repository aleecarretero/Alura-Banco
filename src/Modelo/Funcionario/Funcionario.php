<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Pessoa;
use Alura\Banco\Modelo\CPF;

abstract class Funcionario extends Pessoa {

    private float $salario;

    // Constructor
        public function __construct(string $nome, CPF $cpf, float $salario){
            parent::__construct($nome, $cpf);
            $this->salario = $salario;
        }

    // Getters
        public function getSalario(): float {
            return $this->salario;
        }

    // Setters
        public function setNome(string $nome): void {
            $this->validarNome($nome);
        }

    // Actions
        public function recebeAumento(float $aumento): void {
            if ($aumento < 0){
                echo "O aumento precisa ser positivo";
                return;
            }
            $this->salario += $aumento;
        }
        abstract public function calcBonificacao(): float;
}