<?php


require_once "../model/carros.php";

$marca = $modelo = $ano = $grupo = $valor =  $estado =  $versao = "";

if(isset($_POST["marca"] )){
	$marca = $_POST["marca"];
}

if(isset($_POST["modelo"])){
	$modelo = $_POST["modelo"];
}

if(isset($_POST["ano"])){
	$ano = $_POST["ano"];
}

if(isset($_POST["grupo"])){
	$grupo = $_POST["grupo"];
}

if(isset($_POST["versao"])){
	$versao = $_POST["versao"];
}

if(isset($_FILES['foto']['tmp_name'])){
	
	$uploaddir = '../img';
	$uploadfile = $uploaddir . basename($_FILES['foto']['name']);
	
	if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
		echo "Arquivo válido e enviado com sucesso.\n";
	} else {
		echo "Possível ataque de upload de arquivo!\n";
	}
	
}


if(isset($_POST["valor"])){
	$valor = $_POST["valor"];
}

if(isset($_POST["estado"])){
	$estado = $_POST["estado"];
}


$cadastro = new Carros();
$resultado = $cadastro->inserirCarro($marca, $modelo, $ano, $grupo, $versao, $foto, $valor);

echo $resultado;

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/


?>