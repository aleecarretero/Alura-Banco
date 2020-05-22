<?php

// Executes the given function when failing to load a class
spl_autoload_register(function (string $nomeClasse){

    $basePath = __DIR__ . DIRECTORY_SEPARATOR;

    $caminhoArquivo = str_replace('Alura\\Banco', "$basePath\src", $nomeClasse);
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo); // DIRECTORY_SEPARATOR is a default constant of PHP
    $caminhoArquivo .= '.php';

    if (file_exists($caminhoArquivo)) {
        require_once $caminhoArquivo;
    } else {
        echo "Caminho \"$caminhoArquivo\" não encontrado!";
        exit();
    }
});