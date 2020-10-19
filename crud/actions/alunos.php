<?php

//error_reporting(0);

class Alunos{
    
    private $limit;
    private $palavra;
    private $offset;
    private $pagination = 1;
	private $amount = 1;
    private $table = "alunos";
    private $status = FALSE;
    private $conn;

    //*************************************************************
    //    Função construtora - cria a conexão para todos os métodos
    //*************************************************************
    public function __construct()
    {
        try{
            $this->conn = new mysqli("localhost", "3daw", "mysql123", "3dawTest");
            if($this->conn->connect_errno){
                printf("Erro");
                exit();
            }           
        }
        catch(Exception $e){
            $this->status = false;
        }
    }

    //*************************************************************
    //    Função generateId - cria um ID unico para a tabela
    //*************************************************************
    private function generateid(){

        $sql = "SELECT ROUND((RAND() * 999999), 0);";
        $result = $this->conn->query($sql);        
        $data =  $result->fetch_array(MYSQLI_NUM); 
        return $data[0];
    }

    //*************************************************************
    //  Função insert - insere as informações no BD.
    //  Está sem o campo matricula, que é inserido automaticamente
    //*************************************************************
	
	private function inserirAluno($matricula, $nome, $cpf, $datanasc ){
		
		$response = "";
		
		if(($matricula == "") && (empty($matricula))){
			$matricula = $this->generateid();
		}    
        

        $sql = "INSERT INTO {$this->table} ( Matricula, Nome, CPF, DataNascimento ) VALUES ('{$matricula}', '{$nome}', '{$cpf}', '{$datanasc}')";
        if($this->conn->query($sql)){
            $response = "Insercao feita com sucesso!";
        }
        else{
            $response = $this->conn->error;
        }

        return $response;
	}
	
	//*****************************************************************
	// insert = retorna o método inserirAluno
	//*****************************************************************
    public function insert( $matricula, $nome, $cpf, $datanasc ){
		return $this->inserirAluno($matricula, $nome, $cpf, $datanasc);        
    }

    //*************************************************************
    //  Função updateAluno - Atualiza as informações no BD.
    //*************************************************************
    
    private function updateAluno( $matricula, $nome, $cpf, $datanasc ){

        $response = "";
        $column = array();

        if($nome != ""){
            $vnome = "Nome='{$nome}'";
            array_push($column, $vnome);
        }

        if($cpf != ""){
            $vcpf = "CPF='{$cpf}'";
            array_push($column, $vcpf);
        }

        if($datanasc != ""){
            $vdata = "DataNascimento='{$datanasc}'";
            array_push($column, $vdata);
        }

        $columns = implode(",", $column); 

        $sql = "UPDATE {$this->table} SET $columns WHERE Matricula='{$matricula}' ";

        
        if($this->conn->query($sql)){
            $response = "Atualizacao feita com sucesso!";
        }
        else{
            $response = $this->conn->error;
        }

        return $response;
    }
	
	
	//*************************************************************
    //  Função update - retorna a função updateAluno
    //*************************************************************
    
    public function update( $matricula="", $nome="", $cpf="", $datanasc="" ){
		
        return $this->updateAluno($matricula, $nome, $cpf, $datanasc );
    }
	
	//*************************************************************
    //  Função delete - Exclui as informações no BD.
    //  *************************************************************

    private function deleteAluno( $matricula ){

        $response = "";
		
		if($matricula == ""  && $matricula == 1 && $matricula == "*"){
			$response = false;
		}
		
		else{
			
			 $sql = "DELETE FROM {$this->table} WHERE Matricula = '$matricula'";
			if($this->conn->query($sql)){
				$response = "Exclusao feita com sucesso!";
			}
			else{
				$response = $this->conn->error;
			}			
		}
       return $response;
    }

    //*************************************************************
    //  Função delete - retorna a função privada deleteAluno
    //  *************************************************************

    public function delete( $matricula ){
       return $this->deleteAluno($matricula);
    }

    //****************************************************************
    //  Função contagemRegistros - Conta quantas linhas tem na tabela
    //****************************************************************

    private function contagemRegistros(){

        $sql = $this->buildsql("COUNT(*)");				
        $result = $this->conn->query($sql);
        $data =  $result->fetch_array(MYSQLI_NUM); 
        return $data[0];
    }
	
	//*********************************************************************
    //  Função numeroRegistros - retorna a funcao privada contagemRegistros
    //*********************************************************************
	
	public function numeroRegistros(){
		return $this->contagemRegistros();	
	}
	
		//**************************************************************************************
    //  Função selecionarMatricula - Retorna a trupla, mediante o fornecimento da matricula 
	// Já que a matrícula é única (teoricamente), Só precisamos da linha correspondente
    // *************************************************************************************
	
	private function selecionarMatricula( $matricula ){
		$sql = "SELECT Matricula, Nome, CPF, DataNascimento FROM Alunos WHERE Matricula={$matricula}";
        $query = $this->conn->query($sql);
        $response = $query->fetch_array(MYSQLI_ASSOC);
        return $response;
	}

    //***************************************************************************************
    //  Função consultarMatricula - Retorna a consulta do metodo privado selecionarMatricula
    // **************************************************************************************

    public function consultarMatricula( $matricula ){
          return $this->selecionarMatricula($matricula );    
    }
	
	
    //*************************************************************
    //  Função consultarPalavra - Obtem um argumento obtido pelo post
	// Para um select com argumentos  com WHERE
    // **************************************************************
	
    public function consultarPalavra( $palavra ){
        $this->palavra = $palavra;
    }

    //*************************************************************
    //  Função setoffset - Obtem o offset obtido pelo get
    //  *************************************************************
    public function setOffset( $offset ){
        $this->offset = $offset;
    }

    //*************************************************************
    //  Função setlimit - Obtem o limite de linhas
    // *************************************************************
    public function setLimit( $limit ){
        $this->limit = $limit;
    }

   //*************************************************************
    //  Função buildSql - Constroi a query
    // *************************************************************
    
    private function buildsql( $columns = ""){

        $palavra = $this->palavra;
        $offset = $this->offset;
        $limit = $this->limit;
		
		if(!is_numeric($columns)){
		
			if(empty($columns) && ($columns == "")){
				$columns = "*";
			}
	
			$sql = "SELECT {$columns} FROM {$this->table} ";        
	
			if($palavra != ""){
				$sql .= "WHERE Matricula LIKE '%{$palavra}%' OR Nome LIKE '%{$palavra}%' OR CPF LIKE '%{$palavra}%' OR DataNascimento LIKE '%{$palavra}%'";
			}
			
			if(($limit != "") && (is_numeric($limit))){
				$sql .= " LIMIT {$limit}";
			}
			
			if(($offset != "") && (is_numeric($offset))){
				$sql .= " OFFSET {$offset}";
			}
		}
        return $sql;
    }

    //*************************************************************
    //  Função selectAluno - Retorna um array contendo a consulta do sql
    //  *************************************************************
    private function selectAluno(){

        $service =  array(); 
        
        $sql = $this->buildsql();
		    
        if($query = $this->conn->query($sql))
        {
            $i = 0;
            while($row = $query->fetch_assoc()){

                $service[$i]['Matricula'] = $row['Matricula'] ;
                $service[$i]['Nome'] =  $row['Nome'];
                $service[$i]['CPF'] = $row['CPF'];
                $service[$i]['DataNascimento'] = $row['DataNascimento'];
                $i++;                
            }
            $this->amount = $i;
        }
        else{
            return $this->conn->error;
        }

        return $service;
    }
	
	//*************************************************************
    //  Função select - Retorna a função selectAluno
    //  *************************************************************
    public function select(){
        return $this->selectAluno();
    }
    
    //*************************************************************
    //  Função destruidora - Finaliza a conexão com o bd;
    //  *************************************************************

    public function __destruct(){
        $this->conn->close();
    }
}

?>