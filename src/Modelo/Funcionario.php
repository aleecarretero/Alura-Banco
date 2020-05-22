<?php

namespace Alura\Banco\Modelo;

use Alura\Banco\Modelo\Pessoa;

class Funcionario extends Pessoa {

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
}