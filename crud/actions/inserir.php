<?php

require_once "validacao.php";
require_once "alunos.php";

$matricula = "";
$nome = "";
$cpf = "";
$dataNasc = "";
$erromatr = "";
$erronome = "";
$errocpf = "";
$errodata = "";
$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	if(isset($_POST["manual"])){
		
		if(validarmatricula($_POST["matricula"]))
		{
			$matricula = $_POST["matricula"];
		}
		else{
			$erromatr = "O campo matricula não pode estar em branco. ";
		}
		
		
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

    if(validardata($_POST["dtNasc"])){

        $dataNasc = $_POST["dtNasc"];
    }
    else{
        $errodata = "A data de nascimento não pode estar vazia.";      
    }


    $transaction = new Alunos();  
    $message = $transaction->insert( $matricula, $nome, $cpf, $dataNasc );

}


?>