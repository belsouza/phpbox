<?php

require_once "comum/config.php";
$id = "";

if(isset($_POST["agenciaid"])){
	$id = $_POST["agenciaid"];
}

$ca_conn = new mysqli( $host, $user, $password, $database);
if(!$ca_conn){
	echo "Erro na conexão";
}

$sql = "SELECT * FROM agencias WHERE ID={$id}";

$agencia = array();

if($result = $ca_conn->query($sql)){
	
	$i = 0;
	while($row = $result->fetch_row()){
		$agencia["id"] = $row[0];
		$agencia["loja"] = $row[1];
		$agencia["cidade"] = $row[2];
		$i++;
	}
}

$ca_conn->close();



?>