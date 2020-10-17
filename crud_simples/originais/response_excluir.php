<?php

$matricula = "";
$nome = "";
$cpf = "";
$datanasc = "";
$nerror = "";
$msg = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	if(isset($_POST["matricula"])){
		
		$matricula = $_POST["matricula"];
		$servername = "localhost";
		$username = "3daw";
		$password = "mysql123";
		$database = "3dawtest";

		$conn = new mysqli($servername, $username, $password, $database);
		if($conn->connect_error){
			die ("Connection failed: " . $conn->connect_error);
		}		
		
		$sql = "DELETE FROM alunos WHERE Matricula = " . $matricula;	


		if($result = $conn->query($sql)){
			
			$num = $conn->affected_rows;			
			$msg .= "<p>Exclusão feita com sucesso!</p>";
			$msg .= "<p>{$num} registro excluido.</p>";
			
			
		}else{
			$msg .= "Erro: ". $conn->error;
		}

		$conn->close();	
		
	}	
		
}



?> 