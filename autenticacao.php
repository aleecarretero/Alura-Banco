<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Service\Autenticador;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Funcionario\Gerente;

$autenticador = new Autenticador();

$umGerente = new Gerente(
    'Alexandra',
    new CPF('473.718.980-44'),
    9000
);

$umTitular = new Titular(
    new CPF('44938094851'),
    'Alexandre',
    new Endereco(
        'Osasco',
        'Jardim Boa Vista',
        'Rua Candido Fontoura',
        '401'
    )
);

$autenticador->logIn($umGerente, '4321');
$autenticador->logIn($umTitular, '4321');