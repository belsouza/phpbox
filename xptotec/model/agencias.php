<?php

class Agencias{
	
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
	
	private function insert( $nome, $cidade ){
		
		$sql = "INSERT INTO `agencias` (`ID`, `Loja`, `Cidade`) VALUES (NULL, \"{$nome}\", \"{$cidade}\")";
		
		$conn = $this->conn;
		if($conn->query($sql))
		{
			return "Dados inseridos com sucesso!";
		}		
		return $this->conn->error;		
	}
	
	
	
	public function inserirAgencia( $nome, $cidade )
	{
		if ( (!empty($nome)) and (!empty($cidade))){
			
			return $this->insert( $nome, $cidade );
		}
		
		return "Erro: Campo em branco!";
	}
	
	
	public function __destruct(){
		$this->conn->close();
	}
	
}



?>