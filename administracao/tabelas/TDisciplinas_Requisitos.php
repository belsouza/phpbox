<?php

error_reporting(0);

   class Disciplinas_requisitos{

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

      private function insert( $disciplina, $prerequisito ){           
     
         $sql = "INSERT INTO disciplinas_requisitos ( Disciplina, Pre_requisito ) VALUES ( '{$disciplina}', '{$prerequisito}')";            
         
         if($this->conn->query($sql) === TRUE){
            return "Registro inserido com sucesso";
         } 
         else{
            $this->error = "Houve um erro: " . $this->conn->error;
            return $this->error;
         }  
         
            
      }

      private function update( $disciplina, $prerequisito ){

         $sql = "UPDATE disciplinas_requisitos SET ";

         $columns = array();

         if(!empty( $disciplina )){
            array_push($columns, "Disciplina = '{$disciplina}'");            
         }

         if(!empty( $prerequisito )){

            array_push($columns, "Pre_requisito = '{$prerequisito}'");            
         }
         
         $sql .= implode(", ", $columns);

         $sql .= "WHERE Disciplina = {$disciplina}";
         
         if($this->conn->query($sql) === TRUE){
            return "Registro atualizado com sucesso";
         } 
         else{
            $this->error = "Erro: " . $this->conn->error;
            return $this->error;
         }           
      }

      private function delete( $disciplina ){

         $sql = "DELETE * FROM disciplinas_requisitos WHERE Disciplina ={$disciplina}";
         if($this->conn->query($sql) === TRUE){
            return "Registro excluido com sucesso";
         } 
         else{
            $this->error = "Erro: " . $this->conn->error;
            return $this->error;
         }           
      }

      
      private function select( $args , $disciplina ){
         
         if($args == ""){

            $sql = "SELECT * FROM disciplinas_requisitos";
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

            $sql = "SELECT {$args} FROM disciplinas_requisitos WHERE Disciplina = {$disciplina}";
            $result = $this->conn->query( $sql );

            $cont = $result->num_rows;            

            if($cont > 0){

               $row = $result->fetch_row(); 
               return $row[0];              
               
            }
            else{
               return "Nenhum dado da coluna";
            }
         }
      }

      private function search ( $palavra ){

         $sql = "SELECT * FROM disciplinas_requisitos WHERE Disciplinas LIKE {$palavra} OR Pre_requisitos LIKE {$palavra} ";

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

      public function exibir_disciplina(  $disciplina ){
         return $this->select('Disciplina', $disciplina);
      }

      public function exibir_prerequisito(  $disciplina ){
         return $this->select('Pre_requisito', $disciplina);
      }

      public function procurar( $palavra ){
         return $this->search($palavra);
      }

      public function exibir_disciplinas_requisitos(){         
         return $this->select("", "");         
      }

      public function inserir_requisito( $disciplina, $prerequisito ){
         return $this->insert( $disciplina, $prerequisito );             
      }

      public function atualizar_requisito( $disciplina, $prerequisito ){
         return $this->update( $disciplina, $prerequisito );         
      }

      public function excluir_requisito( $disciplina ){
         return $this->delete($disciplina);         
      }

      public function __destruct(){
         $this->conn->close();
      }

   }


?>