<?php

class Carros{
	
	private $host = "localhost";
	private $username = "3daw";
	private $password = "mysql123";
	private $database = "3dawav2";
	private $conn;
	
	public function __construct(){
		
		try{
			
			$conn = new MySQLi( $this->host, $this->username, $this->password, $this->database);
			if(!$conn){
				throw new Exception("Erro: ". $conn->connect_error);
			}
			
			$this->conn = $conn;			
		}
		catch(Exception $e){
			echo("Erro: " . $e->getMessage());
		}		
	}
	
	private function insert( $marca, $modelo, $ano, $grupo, $versao, $foto, $valor ){
		
		$sql = "INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, '{$marca}', '{$modelo}', '{$ano}', '{$grupo}', '{$versao}', '{$foto}', '{$valor}')";

		$conn = $this->conn;
		if($conn->query($sql))
		{
			return "Dados inseridos com sucesso!";
		}	
		
		return $conn->error;		
	}
	
	
	
	public function inserirCarro( $marca, $modelo, $ano, $grupo, $versao, $foto, $valor )
	{
		if ( (!empty($marca)) and (!empty($modelo)) and (!empty($ano)) and (!empty($grupo)) and (!empty($valor)) and (!empty($estado))){
			
			return $this->insert( $marca, $modelo, $ano, $grupo, $versao, $foto, $valor );
		}
		
		return "Ops! Erro na requisição";
	}
	
	public function __destruct(){
		$this->conn->close();
	}
	
	
	
}



?>