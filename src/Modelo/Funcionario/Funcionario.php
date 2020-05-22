<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Pessoa;
use Alura\Banco\Modelo\CPF;

abstract class Funcionario extends Pessoa {

    private string $cargo;
    private float $salario;

    // Constructor
        public function __construct(string $nome, CPF $cpf, string $cargo, float $salario){
            parent::__construct($nome, $cpf);
            $this->cargo = $cargo;
            $this->salario = $salario;
        }

    // Getters
        public function getCargo(): string {
            return $this->cargo;
        }

        public function getSalario(): float {
            return $this->salario;
        }

    // Setters
        public function setNome(string $nome): void {
            $this->validarNome($nome);
        }

    // Actions
        public function calcBonificacao(): float {
            return $this->getSalario() * 0.1;
        }

        public function recebeAumento(float $aumento): void {
            if ($aumento < 0){
                echo "O aumento precisa ser positivo";
                return;
            }
            $this->salario += $aumento;
        }
}