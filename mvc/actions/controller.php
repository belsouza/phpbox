<?php

class Controller{


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

    public function validaNascimento( $datanasc ){
        if($datanasc == ""){
            return false;
        }
    }

}

