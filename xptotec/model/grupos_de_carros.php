<?php

class Grupos_de_carros{
	
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
	
	private function insert( $grupo, $descricao ){
		
		$sql = "INSERT INTO `grupos_de_carros` (`Grupo`, `Descricao`) VALUES (\"{$grupo}\",  \"{$descricao}\")";
		
		$conn = $this->conn;
		if($conn->query($sql))
		{
			return "Dados inseridos com sucesso!";
		}		
		return false;		
	}
	
	
	private function select_grupo_nome(){
		
		$sql = "SELECT Grupo, Descricao FROM Grupos_de_Carros";
		$grupo = array();
		
		if($result = $this->conn->query($sql)){
			
			$i = 0;
			while($row = $result->fetch_row()){
				$grupo[$i]["grupo"] = $row[0];
				$grupo[$i]["descricao"] = $row[1];
				$i++;
			}
			
			return $grupo;
			
			$this->conn->close();
		}
		else{
			return false;
		}
		
	}
	
	public function nomeGrupo(){
		return $this->select_grupo_nome();
	}
	
	
	
	public function inserirGrupo( $grupo, $descricao )
	{
		if ((!empty($grupo)) and (!empty($descricao))){
			
			return $this->insert( $grupo, $descricao );
		}
		
		return false;
	}
	
	public function __destruct(){
		$this->conn->close();
	}
	
	
	
}



?>