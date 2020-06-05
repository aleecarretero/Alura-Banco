<?php

namespace Alura\Banco\Modelo;

trait GettersSetters {
// Getters
    public function __get(string $attribute) {
        $method = 'get' . ucfirst($attribute);
        return $this->$method();
    }
    
// Setters
}