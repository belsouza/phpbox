<?php

function buildtable( $matricula , $nome, $cpf, $datanasc , $cont , $num){
	
	$table = "<p class='records'>{$num} registro(s) encontrado(s)<p/>";
	$table .= "<table id = 'alunos'>";
	for($i = 0; $i < $cont; $i++){
		$table .= "<tr>";
		$table .= "<td>" . $matricula[$i] ."</td>";
		$table .= "<td>" . $nome[$i] ."</td>"; 
		$table .= "<td>" . $cpf[$i] ."</td>"; 
		$table .= "<td>" . $datanasc[$i] ."</td>";
		$table .= "<td><a href = 'atualizar_aluno.php?editar=".$matricula[$i]."'> Editar </a>";
		$table .= "<td><a href = 'excluir_aluno.php?excluir=".$matricula[$i]."'> Excluir </a>";
		$table .= "</tr>";		
	}		
	$table .= "</table>";	
	return $table;	
}


function mostrar_tabela(){
	
	$servername = "localhost";
	$username = "3daw";
	$password = "mysql123";
	$database = "3dawtest";
	$ncont = 0;
	$xnum = 0;
	
		
	$matricula = $cpf = $nome = $datanasc = array();
	
	$conn = new mysqli($servername, $username, $password, $database);
	if($conn->connect_error){
		die ("Connection failed: " . $conn->connect_error);
	}	

	$sql = "SELECT Matricula, Nome, CPF, DataNascimento FROM alunos";	

	if($result = $conn->query($sql)){
		
		$xnum = $conn->affected_rows;
		
		
		while($row = $result->fetch_assoc()){
			array_push( $matricula, $row["Matricula"] );
			array_push( $nome, $row["Nome"] );
			array_push( $cpf, $row["CPF"] );
			array_push( $datanasc, $row["DataNascimento"] );			
			$ncont += 1;
		}
	}else{
		$erro .= "Erro durante a operacao! " . $conn->error;
	}

	$conn->close();
	$tabela = buildtable( $matricula , $nome, $cpf, $datanasc , $ncont , $xnum);
	
	return $tabela;
}

function mostrar_parcial( $procura ){
	
	$servername = "localhost";
	$username = "3daw";
	$password = "mysql123";
	$database = "3dawtest";
	$tabela = "";
	$contparc = 0;
	$parcial = "";
	
	$matricula = $cpf = $nome = $datanasc = array();
	
	$conn = new mysqli($servername, $username, $password, $database);
	if($conn->connect_error){
		die ("Connection failed: " . $conn->connect_error);
	}
	
	if($procura != ""){
		
		$query = "SELECT * FROM alunos WHERE (Matricula LIKE '%{$procura}%') OR (Nome LIKE '%{$procura}%') OR (CPF LIKE '%{$procura}%') OR (DataNascimento LIKE '%{$procura}%')";	
	
	
		if($result = $conn->query($query)){

			$parcial = $conn->affected_rows;

			while($row = $result->fetch_assoc()){ 
				array_push( $matricula, $row["Matricula"] );
				array_push( $nome, $row["Nome"] );
				array_push( $cpf, $row["CPF"] );
				array_push( $datanasc, $row["DataNascimento"] );			
				$contparc += 1;
			}
		}
	
		$conn->close();
		$tabela = buildtable( $matricula , $nome, $cpf, $datanasc , $contparc , $parcial);	
		
	}
	else{
		$tabela = mostrar_tabela();
	}
	
	return $tabela;	
}



?>