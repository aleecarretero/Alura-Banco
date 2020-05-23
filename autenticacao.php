<?php

require_once 'autoload.php';

use Alura\Banco\Service\Autenticador;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\CPF;

$autenticador = new Autenticador();

$umDiretor = new Diretor(
    'Alexandra',
    new CPF('473.718.980-44'),
    9000
);

$autenticador->logIn($umDiretor, '1234');