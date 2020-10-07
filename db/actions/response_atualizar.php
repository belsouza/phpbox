<?php

$matricula = "";
$nome = "";
$cpf = "";
$datanasc = "";
$nerror = "";
$msg = "";

require_once "consulta.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	if(isset($_POST["matricula"])  && (isset($_POST["nome"]) && (isset($_POST["cpf"]) && (isset($_POST["datanasc"])))))	{
		
		$matricula = $_POST["matricula"];
		$nome = $_POST["nome"];
		$cpf = $_POST["cpf"];
		$datanasc = $_POST["datanasc"];
		
		
		$servername = "localhost";
		$username = "3daw";
		$password = "mysql123";
		$database = "3dawtest";


		$conn = new mysqli($servername, $username, $password, $database);
		if($conn->connect_error){
			die ("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE alunos SET ";
		$sql .= "Nome = '". $nome . "', ";
		$sql .= "CPF= '". $cpf . "', ";
		$sql .= "DataNascimento = '". $datanasc . "' ";
		$sql .= "WHERE Matricula = ". $matricula;


		if($result = $conn->query($sql)){
			$msg .= "<p>Atualizacao feita com sucesso!</p>";
		}else{
			$msg .= "Erro: ". $conn->error;
		}

		$conn->close();
		$msg .= consulta( $matricula );	
		
	}	
}



?> 