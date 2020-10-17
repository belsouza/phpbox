<?php

require_once "validacao.php";
require_once "alunos.php";

$vmatricula = "";
$vnome = "";
$vcpf = "";
$vdatanasc = "";


$matricula = "";
$nome = "";
$cpf = "";
$dataNasc = "";
$erromatricula = "";
$erronome = "";
$errocpf = "";
$errodata = "";
$matricula_val = redirecionar( $matricula );

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $matricula_val = redirecionar( $matricula );

    if(validarmatricula($_POST["matricula"]))
    {
        $matricula = $_POST["matricula"];
    }
    else
    {
        $erromatricula = "É necessário incluir um numero de matrícula valido!";
    }

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

    if(validardata($_POST["datanasc"])){

        $dataNasc = $_POST["datanasc"];
    }
    else{
        $errodata = "A data de nascimento não pode estar vazia.";      
    }

    $transaction = new Alunos();  
    $message = $transaction->delete( $matricula );

}


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if(isset($_GET["excluir"]))
    {
        $data = $_GET["excluir"];
        $complete = new Alunos();
        $resultado = $complete->getData( $data );
        $vmatricula = $resultado['Matricula'];
        $vnome = $resultado['Nome'];
        $vcpf = $resultado['CPF'];
        $vdatanasc = $resultado['DataNascimento'];
        $matricula_val = redirecionar( $vmatricula );         
    }   
}



?>