<?php

ini_set('max_execution_time', 0);
require_once "criardatabase.php";

$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$database = "";
$tables = "";
$inserts = "";
$mensagem_database = "";
$mensagem_tabelas = "";
$mensagem_registros = "";



if($_SERVER["REQUEST_METHOD"] == "POST"){
	
		
	// Criando um Banco de Dados genérico, usando o nome especificado
	if(isset($_POST["dbname"]) && ($_POST["dbname"] != ""))
	{
		$database = $_POST["dbname"];
		if(create_database($servername, $username, $password, $database))
		{
			$mensagem_database.= "Banco de dados criado com sucesso!";
		}		
	}	

	//Dado um arquivo generico, criamos a(s) tabela(s) do banco de dados recem criado
	
	if(isset($_FILES["tabelas"]["tmp_name"]))
	{
		$tables = $_FILES["tabelas"]["name"];		
	}
	
	if(isset($_FILES["registros"]["tmp_name"]))
	{
		$inserts = $_FILES["registros"]["name"];
	}
	
	//Importação de tabelas
	if(validar_extensao($tables))
	{
		$arquivo = $_FILES["tabelas"]["tmp_name"];
		if(create_tables($servername, $username, $password, $arquivo, $database)){
			
			$mensagem_tabelas.= "Tabela(s) importada(s) com sucesso!";
		}		
	}
	
	//Inportação de registros
	if(validar_extensao($inserts))
	{
		$arquivo = $_FILES["registros"]["tmp_name"];
		if(insert_records($servername, $username, $password, $arquivo, $database)){
			$mensagem_registros .= "Registro(s) importado(s) com sucesso!";
		}
	}	
		
}


?>