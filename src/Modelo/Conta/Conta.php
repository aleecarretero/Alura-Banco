<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Endereco;

abstract class Conta {
    
    private static $numeroDeContas = 0;
    private Titular $titular;
    protected float $saldo;

    //  Constructor
        public function __construct(Titular $titular){
            $this->titular = $titular;
            $this->saldo = 0;

            self::$numeroDeContas++; //counter for every Conta object created
        }

    // Getters
        // Saldo
            // Return float of saldo
                public function getSaldo(string $mode = NULL) {
                    if ($mode == '-p'){
                        return formatCurrency($this->saldo);
                    }
                    return $this->saldo;
                }


            // Return string of saldo
                public function getSaldoString(string $mode = NULL): string { //' = NULL' makes the argument optional
                    if ($mode == '-p'){ //if mode is 'print'('-p'), return in currency format
                        return self::formatCurrency($this->saldo);
                    }
                    return $this->saldo;
                }
            
        // Tarifa
            abstract protected function getPercentTarifa(): float;

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
                    echo HORIZONTAL_SEPARATOR;
                    echo TABBING . 'Nome: ' . $this->getNomeTitular() . PHP_EOL;
                    echo TABBING . 'CPF: ' . $this->getCpfTitular(). PHP_EOL;
                    echo TABBING . 'Endereço: ' . $this->getEnderecoTitular()->formatEndereco() . PHP_EOL;
                    echo TABBING . 'Saldo formatado: ' . $this->getSaldoString('-p') . PHP_EOL;
                    echo HORIZONTAL_SEPARATOR;
                }

            protected function formatCurrency(string $value): string {
                return 'R$ ' . number_format($value,2, ',', '.');
            }

    // Transactions
        public function sacar(float $valorASacar): void {
            $tarifaSaque = $valorASacar * $this->getPercentTarifa();
            $valorSaque = $valorASacar + $tarifaSaque;
            if ($valorSaque > $this->saldo){
                echo(
                    'Impossível sacar ' . 
                    self::formatCurrency($valorASacar) .
                    ' (+ ' . self::formatCurrency($tarifaSaque) . ')' .
                    ': Saldo insuficiente' . PHP_EOL
                );
            } else {
                $this->saldo -= $valorSaque;
                echo(
                    'Saque de ' .
                    self::formatCurrency($valorASacar) .
                    ' realizado com sucesso' . PHP_EOL
                );
            }
        }

        public function depositar(float $valorADepositar): void {
            if ($valorADepositar < 0) {
                echo 'Valor precisa ser positivo';
            } else {
                $this->saldo += $valorADepositar;
            }
        }

    // Destructor
        public function __destruct() {
            self::$numeroDeContas--;
        }
}
