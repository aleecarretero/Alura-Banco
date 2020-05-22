<?php
require_once 'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\{Funcionario, Gerente, Diretor, Desenvolvedor};
use Alura\Banco\Service\ControladorBonificacoes;

$umDesenvolvedor = new Desenvolvedor(
    'Alexadre',
    new CPF('44938094851'),
    'Desonvolvedor',
    5000
);

$umGerente = new Gerente(
    'Marcio',
    new CPF('11370894821'),
    'Gerente',
    7000
);

$umDiretor = new Diretor(
    'Alexandra',
    new CPF('473.718.980-44'),
    'Diretora',
    9000
);

$umDesenvolvedor->sobeNivel();
$funcionarios = array($umDesenvolvedor, $umGerente, $umDiretor);
// $umDesenvolvedor->sobreNivel();

$controller = new ControladorBonificacoes();
$controller->addBonificacao($umDesenvolvedor);
$controller->addBonificacao($umGerente);
$controller->addBonificacao($umDiretor);

foreach ($funcionarios as &$funcionario){
    echo (
        HORIZONTAL_SEPARATOR .
        $funcionario->getSalario() . PHP_EOL .
        $funcionario->calcBonificacao() . PHP_EOL
    );
}

echo PHP_EOL . $controller->getTotalBonificacoes();