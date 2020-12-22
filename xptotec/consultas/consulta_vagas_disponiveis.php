<?php

require_once "../comum/config.php";

$conn = new mysqli( $host, $user, $password, $database);
if(!$conn){
	echo "Erro na conexão";
}

/*
$sql = "SELECT catalogo.CarroID, carros.Marca, carros.Modelo, carros.ano, carros.Grupo, grupos_de_carros.Descricao, carros.Versao, carros.Foto, carros.Valor, agencias.Loja, agencias.Cidade, catalogo.Estado FROM catalogo, carros, agencias, grupos_de_carros WHERE (catalogo.CarroID = carros.ID) AND (catalogo.AgenciaID = agencias.ID) AND (carros.Grupo = grupos_de_carros.Grupo) AND (catalogo.Estado = \"Livre\")"; */

$sql = "SELECT * FROM carros WHERE catalogo.Agencia";

$dados = array();

if($result = $conn->query($sql)){
	
	$i = 0;
	while($row = $result->fetch_row()){
		$dados[$i]["id"] = $row[0];
		$dados[$i]["marca"] = $row[1];
		$dados[$i]["modelo"] = $row[2];
		$dados[$i]["ano"] = $row[3];
		$dados[$i]["grupo"] = $row[4];
		$dados[$i]["descricao"] = $row[5];
		$dados[$i]["versao"] = $row[6];
		$dados[$i]["foto"] = $row[7];
		$dados[$i]["valor"] = $row[8];
		$dados[$i]["loja"] = $row[9];
		$dados[$i]["cidade"] = $row[10];
		$dados[$i]["estado"] = $row[11];
		$i++;
	}
}	

echo "<pre>";
print_r($dados);
echo "</pre>";

?>