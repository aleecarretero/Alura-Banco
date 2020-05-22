<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\Conta\Titular;

$conta = new Conta(
    new Titular(
        new CPF('44938094851'),
        'Alexandre Carretero',
        new Endereco(
            'Osasco',
            'Novo Osasco',
            'Via Transversal Sul',
            '169'
        )
    )
);

echo 'Numero total de contas: ' . Conta::getNumeroDeContas() . PHP_EOL;

$conta->depositar(500);
$conta->sacar(200);

$conta->printSummary();

$conta->sacar(290);

$conta->printSummary();