<?php

use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$umEndereco = new Endereco(
    'Osasco', 
    'Jardim Cipava', 
    'Rua Nilo Peçanha', 
    '84'
);

$outroEndereco = new Endereco(
    'Osasco',
    'Novo Osasco',
    'Via Transversal Sul',
    '169'
);

echo $umEndereco;
echo PHP_EOL;
echo $umEndereco->numero;
echo PHP_EOL;
echo $umEndereco->bairro;