<?php

class Cidades{
	
	private $host = "localhost";
	private $database = "3dawsource";
	private $password = "mysql123";
	private $user = "3daw";
	private $conn;
	private $error;
	
	public function __construct(){
		
		try{
			$conn = new MySQLi($this->host, $this->user, $this->password, $this->database);
			if(!$conn){
				throw new Exception ("Não foi possivel conectar ao banco de dados");
			}			
			$this->conn = $conn;				
		}
		catch(Exception $e){
			$this->error = $e->getMessage();
		}		
	}
	
	//Retorna o select como string
	public function mostrarSelect( $uf ){
		
		$conn = $this->conn;
		$sql = "SELECT cidades.Cidade FROM cidades WHERE Sigla='{$uf}' ";
		$cidades = array();
		
		if($result = $conn->query($sql))
		{
			while($row = $result->fetch_row())
			{
				array_push($cidades, $row[0]);
			}
		}
		else{			
			return $conn->error;
		}
		
		return $cidades;
		
	}
}



?>