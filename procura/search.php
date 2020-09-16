<?php

error_reporting(E_ALL);

include "build.php";


$url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$env = strtok($url, "?");
$results = "";
$table = "";
$procurado = "";


$data = getData("data.json");
$id = setRowID($data);
$nome = setRowNome($data);
$compositor = setRowCompositor($data);

if(isset($_GET["procurar"])){
	$procurado = $_GET["procurar"];
}

$pool = getRow($id, $nome, $compositor, $data, $procurado );

$results = getCont($data, $procurado);
$table = buildTable($pool);

 
		



?>

