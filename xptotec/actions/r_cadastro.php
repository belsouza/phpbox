<?php

error_reporting(E_ALL);
require_once "../model/clientes.php";

$nome = "";
$cpf = "";
$data_nascimento = "";
$celular = "";
$senha = "";
$cep = "";
$bairro = "";
$rua = "";
$numero= "";
$complemento = "";
$telefonefixo = "";

if(isset($_POST["nome"] )){
	$nome = $_POST["nome"];
}

if(isset($_POST["cpf"])){
	$cpf = $_POST["cpf"];
}

if(isset($_POST["data_nascimento"])){
	$data_nascimento = $_POST["data_nascimento"];
}

if(isset($_POST["celular"])){
	$celular = $_POST["celular"];
}

if(isset($_POST["senha"])){
	$senha = $_POST["senha"];
}

if(isset($_POST["cep"])){
	$cep = $_POST["cep"];
}

if(isset($_POST["bairro"])){
	$bairro = $_POST["bairro"];
}

if(isset($_POST["rua"])){
	$rua = $_POST["rua"];
}

if(isset($_POST["numero"])){
	$numero= $_POST["numero"];
}

if(isset($_POST["complemento"])){
	$complemento = $_POST["complemento"];
}

if(isset($_POST["telefixo"])){
	$telefonefixo =$_POST["telefixo"];
}


$cadastro = new Clientes();
$resultado = $cadastro->inserirCliente( $nome, $cpf, $data_nascimento, $cep, $bairro, $numero, $complemento, $celular, $telefonefixo, $senha );

echo $resultado;



?>