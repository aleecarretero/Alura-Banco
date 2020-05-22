<?php
require_once 'autoload.php';

use Alura\Banco\Modelo\{Funcionario, CPF};
use Alura\Banco\Service\ControladorBonificacoes;

$umFuncionario = new Funcionario(
    'Alexadre',
    new CPF('44938094851'),
    'Desonvolvedor',
    5000
);


$outroFuncionario = new Funcionario(
    'Marcio',
    new CPF('11370894821'),
    'Fiscal',
    4000
);

$controller = new ControladorBonificacoes();
$controller->addBonificacao($umFuncionario);
$controller->addBonificacao($outroFuncionario);

echo $umFuncionario->getSalario() . PHP_EOL;
echo $umFuncionario->calcBonificacao() . PHP_EOL;
echo $controller->getTotalBonificacoes();