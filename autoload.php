<?php

// Executes the given function when failing to load a class
spl_autoload_register(function (string $nomeClasse){
    $caminhoArquivo = str_replace('Alura\\Banco', 'src', $nomeClasse);
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo); // DIRECTORY_SEPARATOR is a default constant of PHP
    $caminhoArquivo .= '.php';

    if (file_exists( __DIR__ . DIRECTORY_SEPARATOR . $caminhoArquivo)) {
        
        // Testing
        echo $caminhoArquivo . PHP_EOL;
        echo  __DIR__ . DIRECTORY_SEPARATOR . $caminhoArquivo . PHP_EOL . PHP_EOL;
        
        require_once __DIR__ . DIRECTORY_SEPARATOR . $caminhoArquivo;
    } else {
        echo "Caminho \"" . __DIR__  . "$caminhoArquivo\" não encontrado!";
        exit();
    }
});