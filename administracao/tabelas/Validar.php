<?php

    class Validar{

        public function validaNome( $nome ){

            if($nome == ""){
                return false;
            }
            return $nome;
        }

        public function validaCPF( $cpf ){
            if($cpf == ""){
                return false;
            }
            return $cpf;
        }

        public function validaMatricula( $matricula ){
            if($matricula == ""){
                return false;
            }
            return $matricula;
        }

        public function validaDataNascimento( $datanascimento ){
            if($datanascimento == ""){
                return false;
            }
            return $datanascimento;
        }
    }



?>