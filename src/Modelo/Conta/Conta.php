<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Endereco;

class Conta {
    
    private static $numeroDeContas = 0;
    private Titular $titular;
    private float $saldo;

    //  Constructor
        public function __construct(Titular $titular){
            $this->titular = $titular; //initialization of new Titular
            $this->saldo = 0; //initialization of the object with a 0 value
            self::$numeroDeContas++; //counter for every Conta object created
        }

    // Getters
        // Saldo
            // Return float of saldo
                public function getSaldo(string $mode = NULL): float {
                    if ($mode == '-p'){
                        return 'R$ ' . number_format($this->saldo,2, ',', '.');
                    }
                    return $this->saldo;
                }
            // Return string of saldo
                public function getSaldoString(string $mode = NULL): string { //' = NULL' makes the argument optional
                    if ($mode == '-p'){ //if mode is 'print'('-p'), return in currency format
                        return 'R$ ' . number_format($this->saldo,2, ',', '.');
                    }
                    return $this->saldo;
                }

        // Titular
            public function getNomeTitular(): string {
                return $this->titular->getNome();
            }
            public function getCpfTitular(): string {
                return $this->titular->getCpf();
            }
            public function getEnderecoTitular(): Endereco{
                return $this->titular->getEndereco();
            }

        // Number of accounts
            public static function getNumeroDeContas(): int {
                return self::$numeroDeContas; //self stands for the Class this method is in. $this is for the instance and self is for the class
            }

        // Pretty Print
            //Summary
                public function printSummary(){
                    echo '--------------------------------------------------' . PHP_EOL;
                    echo 'Nome: ' . $this->getNomeTitular() . PHP_EOL;
                    echo 'CPF: ' . $this->getCpfTitular(). PHP_EOL;
                    echo 'Endereço: ' . $this->getEnderecoTitular()->formatEndereco() . PHP_EOL;
                    echo 'Saldo formatado: ' . $this->getSaldoString('-p') . PHP_EOL;
                    echo '--------------------------------------------------' . PHP_EOL;
                }

    // Transactions
        public function sacar(float $valorASacar): void {
            if ($valorASacar > $this->saldo){
                echo "Saldo insuficiente";
            } else {
                $this->saldo -= $valorASacar;
            }
        }

        public function depositar(float $valorADepositar): void {
            if ($valorADepositar < 0) {
                echo 'Valor precisa ser positivo';
            } else {
                $this->saldo += $valorADepositar;
            }
        }

        public function transferir(float $valorATransferir, Conta $contaDestino): void {
            if ($valorATransferir > $this->saldo){
                echo 'Saldo indisponível';
            } else {
                $this->sacar($valorATransferir);
                $contaDestino->depositar($valorATransferir);
            }
        }

    // Destructor
        public function __destruct() {
            self::$numeroDeContas--;
        }
}
