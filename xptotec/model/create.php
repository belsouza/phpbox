<?php

class Create{
	
	private static $host = "localhost";
	private static $user = "3daw";
	private static $pass = "mysql123";
	private static $database = "3dawav2";
		
	//Criar novo banco de dados	
	public static function novoBanco(){
		
		try{

			$conn = new mysqli(self::$host, self::$user, self::$pass);
			if(!$conn){
				throw new Exception("Erro na conexão com o mysql: {$conn->connect_error}");
			}

			$sql = "CREATE DATABASE ". self::$database;
			
			if($conn->query($sql))
			{
				echo "Banco de dados criado com sucesso!";
			}
			else{
				throw new Exception("Erro durante a criacao do banco de dados. { $conn->error } "); 
			}
			$conn->close();
		}
		catch(Exception $e){
			echo "Erro: ". $e->getMessage();
		}
		
	}
	
	//Criando as tabelas
	public static function criarTabelas(){
		
		try{

			$conn = new mysqli(self::$host, self::$user, self::$pass, self::$database);
			if(!$conn){
				throw new Exception("Erro na conexão com o Banco: {$conn->connect_error}");
			}

			$sql = "";
			
			if($conn->query($sql))
			{
				echo "Banco de dados criado com sucesso!";
			}
			else{
				throw new Exception("Erro durante a criacao do banco de dados. { $conn->error } "); 
			}
			$conn->close();
		}
		catch(Exception $e){
			echo "Erro: ". $e->getMessage();
		}
		
	}
	
	
	
}

$action = Create::novoBanco();
echo $action;





?>