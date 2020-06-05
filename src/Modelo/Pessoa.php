<?php

namespace Alura\Banco\Modelo;

abstract class Pessoa {

    use GettersSetters;

    protected string $nome;
    private CPF $cpf;

    // Constructor
        public function __construct(string $nome, CPF $cpf){
            $this->validarNome($nome);
            $this->cpf = $cpf;
        }

    // Getters
        public function getNome(): string {
            return $this->nome;
        }

        public function getCpf(): string {
            return $this->cpf->getId();
        }

    // Validators
        // Nome
        final protected function validarNome(string $nome) {
            if (strlen($nome) < 5){
                exit("O nome do titular precisa conter ao menos 5 dígitos!");
            } else {
                $this->nome = $nome;
            }
        }
}