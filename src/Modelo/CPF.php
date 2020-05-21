<?php

namespace Alura\Banco\Modelo;

class CPF{
    private $id;

    public function __construct(string $id){
        if (self::validarCPF($id)){
            $this->id = self::formatarCnpjCpf($id);
        } else {
            exit("CPF inválido");
        }
    }

    //read
        public function getId() {
            return $this->id;
        }
    
    
    //static methods
        //format CNPJ or CPF
        public static function formatarCnpjCpf($cpnj_cpf){
            $cnpj_cpf = preg_replace("/\D/", '', $cpnj_cpf);
            
            if (strlen($cnpj_cpf) === 11) {
                return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
            } 
            if (strlen($cnpj_cpf) === 14) {
                return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
            }
        }

        private static function validarCPF(string $cpf){
            //extract numbers
            $cpf = preg_replace('/\D/', '', $cpf);

            //check length
            if (strlen($cpf) != 11){
                return false;
            }

            //check for repetition
            if (preg_match('/(\d)\1{10}/', $cpf)){
                return false;
            }

            //calculation
            for ($trim = 9; $trim < 11; $trim++) {
                for ($digit = 0, $count = 0; $count < $trim; $count++) {
                    $digit += $cpf{$count} * (($trim + 1) - $count);
                }
                $digit = ((10 * $digit) % 11) % 10;
                if ($cpf{$count} != $digit) {
                    return false;
                }
            }
            return true;
        }
}