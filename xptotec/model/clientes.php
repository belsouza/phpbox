<?php

class Clientes{
	
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
	
	private function insert( $nome, $cpf, $data_nascimento, $cep, $bairro, $numero, $complemento, $celular, $fixo, $senha){
		
		$sql = "INSERT INTO `clientes` (`ID`, `Nome`, `CPF`, `Data_Nascimento`, `CEP`, `Bairro`, `Numero`, `Complemento`, `Celular`, `Fixo`, `SENHA`) VALUES (NULL, \"{$nome}\", \"{$cpf}\", \"{$data_nascimento}\", \"{$cep}\", \"{$bairro}\", \"{$numero}\", \"{$complemento}\", \"{$celular}\", \"{$fixo}\", \"{$senha}\")";
		
		$conn = $this->conn;
		if($conn->query($sql))
		{
			return "Dados inseridos com sucesso!";
		}		
		return $this->conn->error;		
	}
	
	
	
	public function inserirCliente( $nome, $cpf, $data_nascimento, $cep, $bairro, $numero, $complemento, $celular, $fixo, $senha )
	{
		if ( (!empty($nome)) and (!empty($cpf)) and (!empty($data_nascimento)) and (!empty($cep)) and (!empty($bairro)) and (!empty($numero)) and (!empty($complemento)) and (!empty($fixo)) and (!empty($senha))){
			
			return $this->insert( $nome, $cpf, $data_nascimento, $cep, $bairro, $numero, $complemento, $celular, $fixo, $senha );
		}
		
		return "Erro: Campo em branco!";
	}
	
	
	
	
	
	public function login( $cpf , $senha ){
		
		
		$data = array();
		
		if(($cpf == "") or ($senha == "")){			
			
			return "Não pode haver espaços em branco!";
			exit(1);
		}
		
		$sql = "SELECT ID, Nome FROM Clientes WHERE CPF=\"{$cpf}\" AND SENHA=\"{$senha}\"";
		
		if($result = $this->conn->query($sql))
		{			
			while($row = $result->fetch_row()){				
				
				$data["id"] = $row[0];
				$data["nome"] = $row[1];
				
			}			
		}
		
		return $data;
		
	}
	
	
	public function __destruct(){
		$this->conn->close();
	}
	
}



?>