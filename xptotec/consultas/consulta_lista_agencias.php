<?php

require_once "../comum/config.php";


$ca_conn = new mysqli( $host, $user, $password, $database);
if(!$ca_conn){
	echo "Erro na conexão";
}

$sql = "SELECT * FROM agencias";

$agencia = array();

if($result = $ca_conn->query($sql)){
	
	$i = 0;
	while($row = $result->fetch_row()){
		$agencia[$i]["id"] = $row[0];
		$agencia[$i]["loja"] = $row[1];
		$agencia[$i]["cidade"] = $row[2];
		$i++;
	}
	
	echo json_encode($agencia);
}



$ca_conn->close();



?>