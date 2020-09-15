<?php

session_start();

$f1 = "Data com barra: ". date("d/m/Y");
$f2 = "Data com ponto: ". date("d.m.y");
$f3 = "Data com traço: ". date("d-m-y");
$status = false;


if($_SERVER["REQUEST_METHOD"] === "POST" ){
	
	$nome = "";
	$senha = "";
	
	if(isset($_POST["nome"])){
		$nome = $_POST["nome"];
	}
	
	if(isset($_POST["senha"])){
		$senha = $_POST["senha"];
	}
	
	$_SESSION["nome"] = $nome;	
}

?>