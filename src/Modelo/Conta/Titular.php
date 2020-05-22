<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Pessoa;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;

class Titular extends Pessoa {
    //attributes

        private Endereco $endereco;

    //instance methods
        //create
            //contructor
            public function __construct(CPF $cpf, string $nome, Endereco $endereco){
                parent::__construct($nome, $cpf);
                $this->endereco = $endereco;
            }
        
        //read
            //Endereco
            public function getEndereco(): Endereco {
                return $this->endereco;
            }
}