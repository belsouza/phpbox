<?php

   class Professores{

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

      private function insert( $nome, $disciplina, $turno ){         
         
         
         $id = "M".sprintf('%04d', rand(0, 9999)); 
         
         $verificar = "SELECT Nome FROM Professores WHERE ID = {$id}";
         $result = $this->conn->query( $verificar );
         if($result->affected_rows == 0){            

            $sql = "INSERT INTO Professores ( ID, Nome, Disciplina, Turno ) VALUES ( '{$id}', '{$nome}', '{$disciplina}', '{$turno}')";            
            
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

      private function update( $id, $nome, $disciplina, $turno ){

         $sql = "UPDATE Professores SET ";

         $columns = array();

         if(!empty( $nome )){

            array_push($columns, "Nome = '{$nome}'"); 
            
         }

         if(!empty( $disciplina )){

            array_push($columns, "Disciplina = '{$disciplina}'");            
         }

         if(!empty( $turno )){

            array_push($columns, "Turno = '{$turno}'");            
         }

         $sql .= implode(", ", $columns);

         $sql .= "WHERE ID = {$id}";
         
         if($this->conn->query($sql) === TRUE){
            return "Registro atualizado com sucesso";
         } 
         else{
            $this->error = "Erro: " . $this->conn->error;
            return $this->error;
         }           
      }

      private function delete( $id ){

         $sql = "DELETE * FROM Professores WHERE ID={$id}";
         if($this->conn->query($sql) === TRUE){
            return "Registro excluido com sucesso";
         } 
         else{
            $this->error = "Erro: " . $this->conn->error;
            return $this->error;
         }           
      }

      
      private function select( $args , $id ){
         
         if($args == ""){

            $sql = "SELECT * FROM Professores";
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
            $sql = "SELECT {$args} FROM Professores WHERE ID = {$id}";
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

         $sql = "SELECT * FROM Professores WHERE ";

         if(is_string($palavra))
         {
            $sql .= "Nome LIKE '%{$palavra}%' OR Disciplina LIKE '%{$palavra}%' OR ID LIKE '%{$palavra}%' OR ";
         }

         if(is_numeric($palavra))
         {
            $sql.= "Turno LIKE'%{$palavra}%'";
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

      
      public function exibir_nome(  $id ){
         return $this->select('Nome', $id);
      }

      public function exibir_disciplina(  $id ){
         return $this->select('Disciplina', $id);
      }

      public function exibir_turno(  $id ){
         return $this->select( 'Turno', $id);
      }

      public function procurar( $palavra ){
         return $this->search($palavra);
      }

      public function exibir_Professores(){         
         return $this->select("", "");         
      }

      public function inserir_professor(  $nome, $disciplina, $turno ){
         return $this->insert(  $nome, $disciplina, $turno );             
      }

      public function atualizar_professor( $id, $nome, $disciplina, $turno ){
         return $this->update( $id, $nome, $disciplina, $turno);         
      }

      public function excluir_professor( $id ){
         return $this->delete( $id );         
      }

      public function __destruct(){
         $this->conn->close();
      }

   }


?>