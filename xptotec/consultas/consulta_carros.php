<?php

require_once "comum/config.php";
$id = "";

if(isset($_POST["carid"])){
	$id = $_POST["carid"];
}

$conn = new mysqli( $host, $user, $password, $database );
if(!$conn){
	echo "Erro na conexão";
}

$sql = "SELECT * FROM carros WHERE ID = {$id}";

$dados = array();

if($result = $conn->query($sql)){
	
	$i = 0;
	while($row = $result->fetch_row()){
		$dados["id"] = $row[0];
		$dados["marca"] = $row[1];
		$dados["modelo"] = $row[2];
		$dados["ano"] = $row[3];
		$dados["grupo"] = $row[4];
		$dados["versao"] = $row[5];
		$dados["foto"] = $row[6];
		$dados["valor"] = $row[7];
		$i++;
	}
}


?>