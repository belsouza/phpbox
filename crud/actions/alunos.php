<?php

//error_reporting(0);

class Alunos{
    
    private $limit;
    private $arguments;
    private $offset;
    private $amount = 0;   
    private $table = "alunos";
    private $status = FALSE;
    private $conn;

    //*************************************************************
    //    Função construtora - cria a conexão para todos os métodos
    //*************************************************************
    public function __construct()
    {
        try{
            $this->conn = new mysqli("localhost", "root", "823543", "3dawtest");
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

    //*************************************************************
    //  Função update - Atualiza as informações no BD.
    //  *************************************************************
    
    public function update( $matricula="", $nome="", $cpf="", $datanasc="" ){

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
    //  Função delete - Exclui as informações no BD.
    //  *************************************************************

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

    //*************************************************************
    //  Função regcount - Conta quantas linhas tem na tabela
    //  *************************************************************

    private function regcount(){

        $sql = "SELECT COUNT(*) FROM Alunos";
        $result = $this->conn->query($sql);
        $data =  $result->fetch_array(MYSQLI_NUM); 
        return $data[0];
    }

    //************************************************************************
    //  Função getData - Retorna a trupla, mediante o fornecimento da matricula 
    //  ***********************************************************************

    public function getData( $matricula ){
                
        $sql = "SELECT Matricula, Nome, CPF, DataNascimento FROM Alunos WHERE Matricula={$matricula}";
        $query = $this->conn->query($sql);
        $response = $query->fetch_array(MYSQLI_ASSOC);
        return $response;
    }

    //*************************************************************
    //  Função setarguments - Obtem um argumento obtido pelo post
    //  *************************************************************
    public function setArguments( $arguments ){
        $this->arguments = $arguments;
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
    
    private function buildsql(){

        $arguments = $this->arguments;
        $offset = $this->offset;
        $limit = $this->limit;

        $sql = "SELECT * FROM {$this->table} ";        

        if($arguments != ""){
            $sql .= "WHERE Matricula LIKE '%{$arguments}%' OR Nome LIKE '%{$arguments}%' OR CPF LIKE '%{$arguments}%' OR DataNascimento LIKE '%{$arguments}%'";
        }
        
        if($limit != ""){
            $sql .= "LIMIT {$limit}";
        }
        
        return $sql;
    }

    //*************************************************************
    //  Função select - Retorna um array contendo a consulta do sql
    //  *************************************************************
    public function select(){

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
            return $this->conn->error();
        }

        return $service;
    }

    //**************************************************************
    //  Função exibir_tabela - Exibe o select na forma de uma tabela
    //**************************************************************
    public function exibir_tabela(){            
        
        $data = $this->select();
        $limite = $this->amount;
        $table = ""; 
        
        if(count($data) > 0){

            $table .= "<table id='tabela'>";
            $table .= "<thead><tr>";
            $table .= "<td>Matricula</td>";
            $table .= "<td>Nome</td>";
            $table .= "<td>CPF</td>";
            $table .= "<td>Data de Nascimento</td>";
            $table .= "<td>Editar</td>";
            $table .= "<td>Excluir</td>";
            $table .= "</tr></thead>";

            for($i = 0; !empty($data[$i]) && ($i < $limite); $i++){

                $table .= "<tr>";                
                $table .= "<td>{$data[$i]['Matricula']}</td>";
                $table .= "<td>{$data[$i]['Nome']}</td>";
                $table .= "<td>{$data[$i]['CPF']}</td>";
                $table .= "<td>{$data[$i]['DataNascimento']}</td>";
                $table .= "<td><a href='atualizar_aluno.php?editar={$data[$i]['Matricula']}'>Editar</a></td>";
                $table .= "<td><a href='excluir_aluno.php?excluir={$data[$i]['Matricula']}'>Excluir</a></td>";
                $table .= "</tr>";
            }

            $table .= "</table>";
        }
        else{
            $table .= "<p>Nenhum resultado encontrado!</p>";
        }
    
        return $table;

    }

    //*************************************************************
    //  Função getPage - Cria a parte de paginacao - $page_number é o GET page
    //  *************************************************************
    public function get_pagination( $page_number ){

        $plink = "";
        $last = round (( $this->regcount() ) / ( $this->limit )) ; //ultima pagina  
        if(!is_numeric($page_number))
        {
            $page_number = 1;            
        }      
        

        $ini = $page_number;
        $fin = $ini + 4;

        $plink .= "<div class='page_button'>";
        $plink.= "<a href='exibir_alunos.php?page=1'> |< </a>";
        for($i = $ini; $i < $fin; $i++){
        
            $plink.= "<a href='exibir_alunos.php?page={$i}'>{$i}</a>";            
        }
        $plink.= "<a href='exibir_alunos.php?page={$i}'>...</a>";
        $plink.= "<a href='exibir_alunos.php?page={$last}'>{$last}</a>";
        $plink .= "</div>";            
        
        
        return $plink;
    }

    //*************************************************************
    //  Função destruidora - Finaliza a conexão com o bd;
    //  *************************************************************

    public function __destruct(){
        $this->conn->close();
    }
}

?>