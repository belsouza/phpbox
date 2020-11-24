<?php

error_reporting(0);

   class Matriculas{

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

      private function insert( $matricula, $periodo, $horas_cursadas ){         
         
         $id = "M".sprintf('%04d', rand(0, 9999)); 
         
         $verificar = "SELECT * FROM Matriculas WHERE Matricula={$matricula}";
         $result = $this->conn->query( $verificar );

         $cont = $result->num_rows;
         
         if($cont == 0){            

            $sql = "INSERT INTO Matriculas ( Matricula, Periodo, Horas_Cursadas ) VALUES ( '{$matricula}', '{$periodo}', '{$horas_cursadas}')";            
            
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

      private function update( $matricula, $periodo, $horas_cursadas ){

         $sql = "UPDATE Alunos SET ";

         $columns = array();

         if(!empty( $matricula )){

            array_push($columns, "Matricula = '{$matricula}'"); 
            
         }

         if(!empty( $periodo )){

            array_push($columns, "Periodo = '{$periodo}'");            
         }

         if(!empty( $horas_cursadas )){

            array_push($columns, "Horas_Cursadas = '{$horas_cursadas}'");            
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

         $sql = "DELETE * FROM Matriculas WHERE Matricula={$matricula}";
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

            $sql = "SELECT * FROM Matriculas";
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

            echo $args; //NomeCPFDataNascimento 

            $sql = "SELECT {$args} FROM Matriculas WHERE Matricula = {$matricula}";
            $result = $this->conn->query( $sql );

            $cont = $result->num_rows;
            echo $cont;

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

         $sql = "SELECT * FROM Matriculas WHERE ";

         if(is_string($palavra))
         {
            $sql .= "Matricula LIKE '%{$palavra}%'";
         }

         if(is_numeric($palavra))
         {
            $sql.= "OR Periodo LIKE'%{$palavra}%' OR Horas_Cursadas LIKE '%{$palavra}%' OR ";
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

      public function exibir_matricula(  $matricula ){
         return $this->select('Matricula', $matricula);
      }

      public function exibir_periodo(  $matricula ){
         return $this->select('Periodo', $matricula);
      }

      public function exibir_horas_cursadas(  $matricula ){
         return $this->select( 'Horas_Cursadas', $matricula);
      }

      public function procurar( $palavra ){
         return $this->search($palavra);
      }

      public function exibir_matriculas(){         
         return $this->select("", "");         
      }

      public function inserir_matriculas( $periodo, $horas_cursadas ){
         return $this->insert( $periodo, $horas_cursadas );             
      }

      public function atualizar_matriculas( $matricula, $periodo, $horas_cursadas ){
         return $this->update($matricula, $periodo, $horas_cursadas);         
      }

      public function excluir_matriculas( $matricula, $periodo, $horas_cursadas ){
         return $this->delete( $matricula, $periodo, $horas_cursadas );         
      }

      public function __destruct(){
         $this->conn->close();
      }

   }


?>