<?php

$vmatricula = "";
$vnome = "";
$vcpf = "";
$vdatanasc = "";
$nerror = "";

$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$database = "3dawtest";
$tabela = "";
$procura = "";

$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error){
    die ("Connection failed: " . $conn->connect_error);
}
	
if(isset($_GET["excluir"])){

	$matricula = $_GET["excluir"];
	$sql = "SELECT Matricula, Nome, CPF, DataNascimento FROM alunos where Matricula = '{$matricula}'";
	if($result = $conn->query($sql)){
		$row = $result->fetch_assoc();
		$vmatricula = $row["Matricula"];
		$vnome = $row["Nome"];
		$vcpf = $row["CPF"];
		$vdatanasc = $row["DataNascimento"];
	}		
}

?>