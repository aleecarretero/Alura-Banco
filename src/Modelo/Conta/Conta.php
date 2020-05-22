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
                public function getSaldo(string $mode = NULL) {
                    if ($mode == '-p'){
                        return formatSaldo($this->saldo);
                    }
                    return $this->saldo;
                }

                private function formatSaldo(string $saldo): string {
                    return 'R$ ' . number_format($this->saldo,2, ',', '.');
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
                    $tabbing = "    ";
                    $horizontalSeparator = '------------------------------------------------------------';
                    echo $horizontalSeparator . PHP_EOL;
                    echo $tabbing . 'Nome: ' . $this->getNomeTitular() . PHP_EOL;
                    echo $tabbing . 'CPF: ' . $this->getCpfTitular(). PHP_EOL;
                    echo $tabbing . 'Endereço: ' . $this->getEnderecoTitular()->formatEndereco() . PHP_EOL;
                    echo $tabbing . 'Saldo formatado: ' . $this->getSaldoString('-p') . PHP_EOL;
                    echo $horizontalSeparator . PHP_EOL;
                }

    // Transactions
        public function sacar(float $valorASacar): void {
            $tarifaSaque = $valorASacar * 0.05;
            $valorSaque = $valorASacar + $tarifaSaque;
            if ($valorSaque > $this->saldo){
                echo(
                    'Impossível sacar ' . 
                    self::formatSaldo($valorASacar) . 
                    ': Saldo insuficiente' . PHP_EOL
                );
            } else {
                $this->saldo -= $valorSaque;
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
