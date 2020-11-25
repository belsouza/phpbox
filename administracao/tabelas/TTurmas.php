<?php

   class Turmas{

      private $host = "localhost";
      private $user = "root";
      private $password = "823543";
      private $database = "3dawdb";
      private $error = "";
      private $conn;

      public function __construct(){

         try{

            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if ($conn->connect_errno) {
               $this->error .= $conn->connect_error;
            }
            $this->conn = $conn;
         }
         catch(Exception $e){
            $this->error .= $e->getMessage();
         }         
      }

      private function insert( $nome, $cpf, $datanascimento ){         
         
         $date = date_create( $datanascimento );
         $datanascimento = date_format($date,"Y/m/d");

         $id = "M".sprintf('%04d', rand(0, 9999)); 
         
         $verificar = "SELECT Nome, CPF FROM turmas WHERE CPF = {$cpf} OR Matricula = {$id}";
         $result = $this->conn->query( $verificar );
         if($result->affected_rows == 0){            

            $sql = "INSERT INTO turmas ( Matricula, Nome, CPF, DataNascimento) VALUES ( '{$id}', '{$nome}', '{$cpf}', '{$datanascimento}')";            
            
            if($this->conn->query($sql) === TRUE){
               return "Registro inserido com sucesso";
            } 
            else{
               $this->error = "Houve um erro: " . $this->conn->error;
               return $this->error;
            }  
         }        
         else{
            return "Já Presente.";
         }
            
      }

      private function update( $matricula, $nome, $cpf, $datanascimento ){

         $sql = "UPDATE turmas SET ";

         $columns = array();

         if(!empty( $nome )){

            array_push($columns, "Nome = '{$nome}'"); 
            
         }

         if(!empty( $cpf )){

            array_push($columns, "CPF = '{$cpf}'");            
         }

         if(!empty( $datanascimento )){

            array_push($columns, "DataNascimento = '{$datanascimento}'");            
         }

         $sql .= implode(", ", $columns);

         $sql .= "WHERE Matricula = {$matricula}";
         
         if($this->conn->query($sql) === TRUE){
            return "Registro atualizado com sucesso";
         } 
         else{
            $this->error = "Erro: " . $this->conn->error;
            return $this->error;
         }           
      }

      private function delete( $matricula ){

         $sql = "DELETE * FROM turmas WHERE Matricula={$matricula}";
         if($this->conn->query($sql) === TRUE){
            return "Registro excluido com sucesso";
         } 
         else{
            $this->error = "Erro: " . $this->conn->error;
            return $this->error;
         }           
      }

      
      private function select( $args , $matricula ){
         
         if($args == ""){

            $sql = "SELECT * FROM turmas";
            $result = $this->conn->query( $sql );
            if($result->num_rows > 0){

               $consulta = array();

               while($row = $result->fetch_array(MYSQLI_ASSOC)){
                  array_push( $consulta, $row);
               }

               return $consulta;
            }
            else{
               return "Nenhum dado ainda";
            } 
         }
         else
         {
            $sql = "SELECT {$args} FROM turmas WHERE Matricula = {$matricula}";
            $result = $this->conn->query( $sql );
            if($result->num_rows > 0){

               $row = $result->fetch_row(); 
               return $row[0];              
               
            }
            else{
               return "Nenhum dado da coluna";
            }
         }
      }

      private function search ( $palavra ){

         $sql = "SELECT * FROM turmas WHERE ";

         if(is_numeric($palavra))
         {
            $sql.= "Matricula LIKE'%{$palavra}%' OR CPF LIKE '%{$palavra}%' OR ";
         }

         if(is_string($palavra))
         {
            $sql .= "Nome LIKE '%{$palavra}%'";
         }

         $pos = strpos($palavra, '-');
         if($pos === TRUE)
         {
            $sql.= "OR DataNascimento LIKE '%{$palavra}%'";
         }  

         $result = $this->conn->query( $sql );
         $cont = $result->num_rows;

         if($cont > 0){

            $consulta = array();

            while($row = $result->fetch_array(MYSQLI_ASSOC)){
               array_push( $consulta, $row);
            }
            
            return $consulta;
         }
         else{
            return "Nenhum dado ainda";
         }              
      }

      public function exibir_nome(  $matricula ){
         return $this->select('Nome', $matricula);
      }

      public function exibir_cpf(  $matricula ){
         return $this->select('CPF', $matricula);
      }

      public function exibir_datanascimento(  $matricula ){
         return $this->select( 'DataNascimento', $matricula);
      }

      public function procurar( $palavra ){
         return $this->search($palavra);
      }

      public function exibir_turmas(){         
         return $this->select("", "");         
      }

      public function inserir_turma( $nome, $cpf, $datanascimento ){
         return $this->insert( $nome, $cpf, $datanascimento );             
      }

      public function atualizar_turma( $matricula, $nome, $cpf, $datanascimento ){
         return $this->update($matricula, $nome, $cpf, $datanascimento);         
      }

      public function excluir_turma( $matricula, $nome, $cpf, $datanascimento ){
         return $this->delete($matricula, $nome, $cpf, $datanascimento);         
      }

      public function __destruct(){
         $this->conn->close();
      }

   }


?>