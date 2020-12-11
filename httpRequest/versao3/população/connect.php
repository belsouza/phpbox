<?php

// O insert vai demorar muito - tem que aumentar o tempo de execução do PHP
// 5 minutos (300s) 

ini_set('max_execution_time', 1200);

class Connection
{
	//Dados referentes ao arquivo sql incluso
	
	private $host = "localhost";
	private $database = "";
	private $password = "mysql123";
	private $user = "3daw";
	private $conn;
	private $error;
	
	public function __construct(){
		
		try{
			$conn = new MySQLi($this->host, $this->user, $this->password);
			if(!$conn){
				throw new Exception ("Não foi possivel conectar ao banco de dados");
			}			
			$this->conn = $conn;				
		}
		catch(Exception $e){
			$this->error = $e->getMessage();
		}		
	}

	
	//Função que importa os dados do arquivo uf.sql e o executa
	public function criaEstados(){
		
		$conn = $this->conn;
		
		//Obtem o arquivo sql
		$popular = file_get_contents("uf.sql");
		
		//Transforma as instruções em um array
		$instrucoes = explode(";", $popular);
		
		//Declaração de string vazia
		$status = "";
		
		//Itera o array fazendo uma query por vez
		foreach( $instrucoes as $linha ){
			
			if($conn->query($linha))
			{
				$status .= "Estados importados com sucesso!" . "<br>";
			}
			else{
				return $conn->error;
			}
		}
		$conn->close();		
		return $status;
		
	}
	
	//Função que importa os dados do arquivo cidades.sql e o executa
	
	public function criaCidades(){
		
		$conn = $this->conn;
		$popular = file_get_contents("cidades.sql");
		$processo = 0;
		
		$status = "";
		
		if ($conn -> multi_query($popular)) {
			
		  do {
			// Store first result set
			if ($result = $conn -> store_result()) {
			  while ($row = $result -> fetch_row()) { /* Faz nada  */ }
			 	$result -> free_result();
			}
			// if there are more result-sets, the print a divider
			if ($conn -> more_results()) {
				$processo += 1;
				
				//Exibe o processamento em tempo de execução
			  	printf(" ------ Inserido Registro %d ------\n", $processo);
			}
			 //Prepare next result set
		  } while ($conn -> next_result());
		}

		$conn -> close();		
		
		$status .= "Cidades importadas com sucesso!" . "<br>";
		return $status;
		
	}
	
	// Função que constroi a as query na pagina do navegador
	// É só copiar e colar (desde que não se exclua a pasta que contem os dados dos municipios)
	
	public function construirquery(){
		
		$estados = array( 'AC','AL','AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF');
		$sql = "";
		
		foreach($estados as $chave =>$cidade){
						
			$data = file_get_contents("estados/{$cidade}.txt");
			$cdata = explode("\n", $data );
			
			foreach($cdata as $item){
				
				if($item != ""){
					$sql .= "INSERT INTO Cidades (ID, Sigla, Cidade) VALUES (NULL, \"{$cidade}\", \"{$item}\");". "<br>";		
				}					
			}			
		}
		
		echo utf8_encode( $sql );	
		
	}
	
	
	// Método que mostra os erros
	public function getError(){
		return $this->error;
	}
		
}


?>