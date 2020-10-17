<?php

require_once "validacao.php";
require_once "alunos.php";

$nome = "";
$cpf = "";
$dataNasc = "";
$erronome = "";
$errocpf = "";
$errodata = "";
$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(validarnome($_POST["nome"]))
    {
        $nome = $_POST["nome"];
    }
    else{
        $erronome = "O campo nome não pode estar vazio.";
    }


    if(validarcpf($_POST["cpf"])){

        $cpf = $_POST["cpf"];
    }
    else{
        $errocpf = "O campo cpf não pode estar vazio.";      
    }

    if(validardata($_POST["dtNasc"])){

        $dataNasc = $_POST["dtNasc"];
    }
    else{
        $errodata = "A data de nascimento não pode estar vazia.";      
    }


    $transaction = new Alunos();  
    $message = $transaction->insert( $nome, $cpf, $dataNasc );

}


?>