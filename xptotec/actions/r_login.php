<?php

session_start();
require_once ("../model/clientes.php");


$cpf = $senha = "";
$_SESSION["ID"] = "";
$_SESSION["Nome"] = "";


if(isset($_POST["cpf"])){
	$cpf = $_POST["cpf"];
}

if(isset($_POST["senha"])){
	$senha = $_POST["senha"];
}

$login = new Clientes();
if($data = $login->login($cpf, $senha)) {	
	
	echo "Cliente encontrado!";			
	$_SESSION["ID"] = $data["id"];
	$_SESSION["Nome"] = $data["nome"];	
	
}
else{
	echo "Cliente não encontrado!";
}

?>