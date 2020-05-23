<?php
require_once 'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\{Funcionario, EditorVideo, Gerente, Diretor, Desenvolvedor};
use Alura\Banco\Service\ControladorBonificacoes;

$umDesenvolvedor = new Desenvolvedor(
    'Alexadre',
    new CPF('44938094851'),
    5000
);

$umGerente = new Gerente(
    'Marcio',
    new CPF('11370894821'),
    7000
);

$umDiretor = new Diretor(
    'Alexandra',
    new CPF('473.718.980-44'),
    9000
);

$umEditor = new EditorVideo(
    'Giovana',
    new CPF('44938094851'),
    5500
);

$umDesenvolvedor->sobeNivel();
$funcionarios = array($umDesenvolvedor, $umGerente, $umDiretor, $umEditor);
// $umDesenvolvedor->sobreNivel();

$controller = new ControladorBonificacoes();
$controller->addBonificacao($umDesenvolvedor);
$controller->addBonificacao($umGerente);
$controller->addBonificacao($umDiretor);
$controller->addBonificacao($umEditor);

foreach ($funcionarios as &$funcionario){
    echo (
        HORIZONTAL_SEPARATOR .
        $funcionario->getSalario() . PHP_EOL .
        $funcionario->calcBonificacao() . PHP_EOL
    );
}

echo PHP_EOL . $controller->getTotalBonificacoes();