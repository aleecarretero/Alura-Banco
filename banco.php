<?php

require_once 'src/Pessoa.php';
require_once 'src/Conta.php';
require_once 'src/Endereco.php';
require_once 'src/CPF.php';
require_once 'src/Titular.php';


$endereco = new Endereco('Osasco', 'Novo Osasco', 'Via Transversal Sul', '169');

$alexandre = new Titular(new CPF('44938094851'), 'Alexandre Carretero', $endereco);
$primeiraConta = new Conta($alexandre);
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);


echo 'Numero total de contas: ' . Conta::getNumeroDeContas() . PHP_EOL;

$marcio = new Titular(new CPF('113.708.948-21'), 'Marcio Carretero', $endereco);
$segundaConta = new Conta($marcio);
$segundaConta->depositar(1000);
$segundaConta->sacar(100);
$segundaConta->transferir(150,$primeiraConta);

echo 'Numero total de contas: ' . Conta::getNumeroDeContas() . PHP_EOL;

$primeiraConta->printSummary();
$segundaConta->printSummary();