<?php

$userid = $dias = $carid = $valor = $agenciaid = $dataretirada = $horaretirada = $datadevolucao = $horadevolucao = $diaria  = $taxa_administrativa = $total = "";


if(isset($_POST["userid"])){
   $userid = $_POST["userid"];
}

if(isset($_POST["carid"])){
	$carid = $_POST["carid"];
}

if(isset($_POST["valor"])){
	$valor = $_POST["valor"];
}

if(isset($_POST["agenciaid"])){
	$agenciaid = $_POST["agenciaid"];
}

if(isset($_POST["dataretirada"])){
	$dataretirada = $_POST["dataretirada"];
}

if(isset($_POST["horaretirada"])){
	$horaretirada = $_POST["horaretirada"];
}

if(isset($_POST["datadevolucao"])){
	$datadevolucao = $_POST["datadevolucao"];
}

if(isset($_POST["horadevolucao"])){
	$horadevolucao = $_POST["horadevolucao"];
}

if(isset($_POST["dias"])){
	$dias = $_POST["dias"];
}


$diaria =  $valor / 12;
$taxa_administrativa = ($valor / 12) * 0.12;
$total = ($diaria * $dias) + $taxa_administrativa;

?>


