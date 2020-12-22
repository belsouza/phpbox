<?php

class Reserva{
	
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
	
	private function insert( $cliente, $carro, $local_ret, $data_ret, $hora_ret, $data_dev, $hora_dev ){
		
		$sql = "INSERT INTO `reservas` (`ReservaID`, `Cliente`, `Carro`, `Local_Retirada`, `Data_retirada`, `Hora_retirada`, `Data_devolucao`, `Hora_devolucao`) VALUES (NULL, {$cliente}, {$carro}, {$local_ret}, {$data_ret}, {$hora_ret}, {$data_dev},  {$hora_dev})";
		
		$conn = $this->conn;
		if($conn->query($sql))
		{
			return "Dados inseridos com sucesso!";
		}		
		return false;		
	}
	
	
	
	public function inserirRegistro( $cliente, $carro, $local_ret, $data_ret, $hora_ret, $data_dev, $hora_dev )
	{
		if ( (!empty($cliente)) and (!empty($carro)) and (!empty($local_ret)) and (!empty($data_ret)) and (!empty($hora_ret)) and (!empty($data_dev)) and (!empty($hora_dev))){
			
			return $this->insert( $cliente, $carro, $local_ret, $data_ret, $hora_ret, $data_dev, $hora_dev );
		}
		
		return false;
	}
	
	public function __destruct(){
		$this->conn->close();
	}
	
	
	
}



?>