<?php

namespace Alura\Banco\Modelo;

use Alura\Banco\Modelo\Pessoa;

class Funcionario extends Pessoa {

    private string $cargo;

    // Constructor
        public function __construct(string $nome, CPF $cpf, string $cargo){
            parent::__construct($nome, $cpf);
            $this->cargo = $cargo;
        }

    // Getters
        public function getCargo(){
            return $this->cargo;
        }

    // Setters
        public function setNome(string $nome): void {
            $this->validarNome($nome);
        }
}