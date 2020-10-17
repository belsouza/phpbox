<?php



//Validar a extensão do arquivo
function validar_extensao( $filename ){
	
	$n1 = explode(".", $filename);
	$ext1 = array_pop( $n1 );
	if($ext1 == "sql"){
		return true;
	}
	return false;
}

//Criar Banco de Dados
function create_database( $servername, $username, $password, $database ){
	
	$conn = new mysqli($servername, $username, $password);
	if($conn->connect_error){
		die ("Erro na conexao: " . $conn->connect_error);
	}

	$sql = "CREATE DATABASE $database";
	if( $conn->query($sql) === TRUE){
		return true;
	}
	else{
		return false;
	}
	$conn->close();	
}

//Importar Tabelas
function create_tables( $servername, $username, $password, $arquivo , $database){
	
	$conn = new mysqli($servername, $username, $password, $database);
	if($conn->connect_error){
		die ("Connection failed: " . $conn->connect_error);
	}

	$data = file_get_contents( $arquivo );		

	if($conn->multi_query($data))
	{
		$i = 0;
		do{				
			if($result = $conn->store_result()){

				while($row = $result->fetch_row()){ 					

					$i++; 
				}
				$result->free();
			}
		}
		while($conn->next_result());		
		$conn->close();
		
		return true;
	}	
		
	return false;
}

//Importar Registros
function insert_records($servername, $username, $password, $arquivo , $database){
		
	$conn = new mysqli($servername, $username, $password, $database);
	if($conn->connect_error){
		die ("Connection failed: " . $conn->connect_error);
	}

	$data = file_get_contents($arquivo);		

	if($conn->multi_query($data))
	{
		$i = 0;
		do{				
			if($result = $conn->store_result()){

				while($row = $result->fetch_row()){  
					echo "<img src='zloading.gif'>";
					$i++; 
				}
				$result->free();
			}
		}
		while($conn->next_result());
		return true;
		$conn->close();
	}
	
	return false;
}


?>