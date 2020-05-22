<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\{Endereco, CPF};
use Alura\Banco\Modelo\Conta\{Conta, Titular, ContaPoupanca, ContaCorrente};

// Conta Corrente
    $contaCorrente = new ContaCorrente(
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

    $contaCorrente->depositar(500);
    $contaCorrente->sacar(200);

    $contaCorrente->printSummary();

    $contaCorrente->sacar(277);

    $contaCorrente->printSummary();

// Conta Poupança
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

    $contaPoupanca->sacar(287);

    $contaPoupanca->printSummary();