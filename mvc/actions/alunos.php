<?php

class Alunos{

    private $table = "alunos";
    private $status = FALSE;
    private $conn;

    public function __construct()
    {
        try{
            $this->conn = new mysqli("localhost", "root", "823543", "admoestacao");
            if($this->conn->connect_errno){
                printf("Erro");
                exit();
            }           
        }
        catch(Exception $e){
            $this->status = false;
        }
    }

    private function generateid(){

        $sql = "SELECT ROUND((RAND() * 999999), 0);";
        $result = $this->conn->query($sql);        
        $data =  $result->fetch_array(MYSQLI_NUM); 
        return $data[0];

    }


    public function insert( $nome, $cpf, $datanasc ){

        $response = "";
        
        $matricula = $this->generateid();

        $sql = "INSERT INTO {$this->table} ( Matricula, Nome, CPF, DataNascimento ) VALUES ('{$matricula}', '{$nome}', '{$cpf}', '{$datanasc}')";
        if($this->conn->query($sql)){
            $response = "Insercao feita com sucesso!";
        }
        else{
            $response = $this->conn->error;
        }

        return $response;
    }

    
    public function update( $matricula="", $nome="", $cpf="", $datanasc="" ){

        $response = "";
        $column = [];

        if($nome != ""){
            $vnome = "Nome='{$nome}'";
            array_push($column, $vnome);
        }

        if($cpf != ""){
            $vcpf = "CPF='{$cpf}'";
            array_push($column, $vcpf);
        }

        if($datanasc != ""){
            $vdata = "CPF='{$datanasc}'";
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

    public function delete( $matricula ){

        $response = "";
        $sql = "DELETE FROM {$this->table} WHERE Matricula = '$matricula'";
        if($this->conn->query($sql)){
            $response = "Exclusao feita com sucesso!";
        }
        else{
            $response = $this->conn->error;
        }

        return $response;
    }


    public function select( $arguments = "", $page = 1, $limit = 1 ){

        $service = [];        
        $offset = ($limit * $page) - $limit;

        if($arguments != "")
        {
            $sql = "SELECT * FROM {$this->table} WHERE Matricula LIKE '%{$arguments}%' OR Nome LIKE '%{$arguments}%' OR CPF LIKE '%{$arguments}%' OR DataNascimento LIKE '%{$arguments}%' LIMIT {$limit} OFFSET {$offset}";
        }
        else{
            $sql = "SELECT * FROM {$this->table} LIMIT {$limit} OFFSET {$offset}";
        }        
        
        if($query = $this->conn->query($sql))
        {
            while($row = $query->fetch_assoc()){

                $data =  $row['Matricula'] . $row['Nome'] . $row['CPF']. $row['DataNascimento'];
                array_push($service, $data);
            }
        }

        return implode("<br/>", $service);

    }
}



?>