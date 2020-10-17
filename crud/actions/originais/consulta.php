<?php

function consulta( $matricula ){
	
$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$database = "3dawtest";
$info = "";



	$conn = new mysqli($servername, $username, $password, $database);
	if($conn->connect_error){
		die ("Connection failed: " . $conn->connect_error);
	}
	
	if(!empty($matricula)){
		
		$sql = "SELECT Matricula, Nome, CPF, DataNascimento FROM Alunos WHERE Matricula = '{$matricula}'";
		
		
		if($result = $conn->query($sql)){
			
			$qte = $conn->affected_rows;
			$row = $result->fetch_assoc();
			$info .= "<span>". $qte. " linha afetada.</span>";
			$info .= "<span> Matricula: " . $row["Matricula"]. "</span>";
			$info .= "<span> Nome: " . $row["Nome"]. "</span>";
			$info .= "<span> CPF: ". $row["CPF"]. "</span>";
			$info .= "<span> Data de Nascimento:" . $row["DataNascimento"] ."</span>";
		}
		else{
			$info .= "<span>Erro durante o processamento das informações. O codigo do erro é " . $conn->errno . "</span>";
			$info .= "<span> Mensagem: " . $conn->error . "</span>";
		}
		
		
	}
	else{
		$info .= "<span> O campo matricula esta vazio! </span>";
	}	
	
	$conn->close();
	return $info;

}


?>