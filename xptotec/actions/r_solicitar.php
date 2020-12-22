<?php

require_once "../comum/config.php";


$cidade = "";
$retirada = "";
$hora_retirada = "";
$devolucao = "";
$hora_devolucao = "";

if(isset($_POST["cidade"])){
	$cidade = $_POST["cidade"];
}

if(isset($_POST["retirada"])){
	$retirada = $_POST["retirada"];
}

if(isset($_POST["hora_retirada"])){
	$hora_retirada = $_POST["hora_retirada"];
}

if(isset($_POST["devolucao"])){
	$devolucao = $_POST["devolucao"];
}

if(isset($_POST["hora_devolucao"])){
	$hora_devolucao = $_POST["hora_devolucao"];
}

$conn = new mysqli($host, $user,$password,$database);

if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}


$sql = "SELECT COUNT(*) AS total FROM reservas, agencias WHERE (agencias.id = reservas.Agencia) AND agencias.Cidade= \"{$cidade}\" AND `Data_retirada` >= \"{$retirada}\" AND  `Data_devolucao`<= \"{$devolucao}\"";

if($result = $conn->query($sql)){
		
	$data= $result->fetch_assoc();
	
	if( $data['total'] > 0){
		echo "Tente outra data";
	}
	
}


?>

