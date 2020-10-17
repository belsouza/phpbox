<?php

$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$database = "3dawtest";
$nreg = 0;
$tabela = "";
	
$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error){
    die ("Connection failed: " . $conn->connect_error);		
}

$query = "SELECT * FROM alunos";


if($result = $conn->query($query)){

    $nreg = $conn->affected_rows;

    $tabela .= "<p>{$nreg} registro(s) encontrado(s)</p>";

    $tabela .= "<table id = 'alunos'>";

    $i = 0;
    if ($nreg > 0) {
        while ($row = $result->fetch_assoc()) {			
				
			$tabela .= "<tr>";
			$tabela .= "<td>" . $row['Matricula'] ."</td>";
			$tabela .= "<td>" . $row['Nome']  ."</td>"; 
			$tabela .= "<td>" . $row['CPF']  ."</td>"; 
			$tabela .= "<td>" . $row['DataNascimento']  ."</td>";		
			$tabela .= "</tr>";	           	
        }
		
        $tabela .= "</table>";	
    }
    else{
        $tabela .= "Nenhum registro encontrado!";
    }
}
$conn->close();


?>