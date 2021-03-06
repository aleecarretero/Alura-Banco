<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Conta\Titular;

$endereco = new Endereco('Osasco', 'Novo Osasco', 'Via Transversal Sul', '169');

$alexandre = new Titular(new CPF('44938094851'), 'Alexandre Carretero', $endereco);
$primeiraConta = new ContaCorrente($alexandre);
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);


echo 'Numero total de contas: ' . Conta::getNumeroDeContas() . PHP_EOL;

$outroEndereco = new Endereco('Osasco', 'Jardim Cipava', 'Rua Nilo Peçanha', '84');

$marcio = new Titular(new CPF('113.708.948-21'), 'Marcio Carretero', $outroEndereco);
$segundaConta = new ContaCorrente($marcio);
$segundaConta->depositar(1000);
$segundaConta->sacar(100);
$segundaConta->transferir(150,$primeiraConta);

echo 'Numero total de contas: ' . Conta::getNumeroDeContas() . PHP_EOL;

echo $primeiraConta;
echo $segundaConta;