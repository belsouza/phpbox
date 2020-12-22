<?php

require_once "../model/agencias.php";

$nome = $cidade = "";

if(isset($_POST["nome"])){
	$nome = $_POST["nome"];
}

if(isset($_POST["cidade"])){
	$cidade = $_POST["cidade"];
}

$agencia = new Agencias();
$resposta = $agencia->inserirAgencia($nome, $cidade);
echo $resposta;


?>