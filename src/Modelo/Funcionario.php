<?php

namespace Alura\Banco\Modelo;

use Alura\Banco\Modelo\Pessoa;

class Funcionario extends Pessoa{

    private string $cargo;

    public function __construct(string $nome, CPF $cpf, string $cargo){
        parent::__construct($nome, $cpf);
        $this->cargo = $cargo;
    }

    //getters
    public function getCargo(){
        return $this->cargo;
    }

    //setters
    public function setNome(string $nome): void {
        $this->validarNome($nome);
    }
}