<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Conta\ContaPoupanca;
use Alura\Banco\Modelo\Conta\ContaCorrente;

$conta = new ContaCorrente(
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

echo 'Numero total de contas: ' . Conta::getNumeroDeContas() . PHP_EOL . HORIZONTAL_SEPARATOR;

$conta->depositar(500);
$conta->sacar(200);

$conta->printSummary();

$conta->sacar(200);

$conta->printSummary();

$contaPoupanca = new ContaPoupanca(
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

echo 'Numero total de contas: ' . Conta::getNumeroDeContas() . PHP_EOL . HORIZONTAL_SEPARATOR;

$contaPoupanca->depositar(500);
$contaPoupanca->sacar(200);

$contaPoupanca->printSummary();

$contaPoupanca->sacar(200);

$contaPoupanca->printSummary();