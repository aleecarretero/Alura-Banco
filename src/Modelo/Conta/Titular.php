<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Pessoa;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;

class Titular extends Pessoa {
    
    private Endereco $endereco;

    // Constructor
        public function __construct(CPF $cpf, string $nome, Endereco $endereco){
            parent::__construct($nome, $cpf);
            $this->endereco = $endereco;
        }
    
    // Getters
        public function getEndereco(): Endereco {
            return $this->endereco;
        }
}