<?php

   class disciplinas{

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

      private function insert( $codigo, $descricao, $periodo, $tipo, $ncreditos, $ch ){         
                  
      
         
         $verificar = "SELECT Disciplina FROM disciplinas WHERE Disciplina = {$codigo} OR Descricao = {$descricao}";
         $result = $this->conn->query( $verificar );
         if($result->affected_rows == 0){            

            $sql = "INSERT INTO disciplinas ( Disciplina, Descricao, Periodo, Tipo, NCreditos, CH ) VALUES ( '{$codigo}', '{$descricao}', '{$periodo}', '{$tipo}', '{$ncreditos}', '{$ch}' )";            
            
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

      private function update( $codigo, $descricao, $periodo, $tipo, $ncreditos, $ch ){

         $sql = "UPDATE disciplinas SET ";

         $columns = array();

         if(!empty( $codigo )){
            array_push($columns, "Disciplina = '{$codigo}'");             
         }

         if(!empty( $descricao )){
            array_push($columns, "Descricao = '{$descricao}'");            
         }

         if(!empty( $periodo )){
            array_push($columns, "Periodo = '{$periodo}'");            
         }

         if(!empty( $tipo )){
            array_push($columns, "Tipo = '{$tipo}'");            
         }

         if(!empty( $ncreditos )){
            array_push($columns, "NCreditos = '{$ncreditos}'");            
         }

         if(!empty( $ch )){
            array_push($columns, "CH = '{$ch}'");            
         }


         $sql .= implode(", ", $columns);

         $sql .= "WHERE Disciplina = {$codigo}";
         
         if($this->conn->query($sql) === TRUE){
            return "Registro atualizado com sucesso";
         } 
         else{
            $this->error = "Erro: " . $this->conn->error;
            return $this->error;
         }           
      }

      private function delete( $disciplina ){

         $sql = "DELETE * FROM Disciplinas WHERE Disciplina={$disciplina}";
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

            $sql = "SELECT * FROM Disciplinas";
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
            $sql = "SELECT {$args} FROM disciplinas WHERE Disciplina = {$disciplina}";
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

         $sql = "SELECT * FROM Disciplinas WHERE ";

         if(is_string($palavra))
         {
            $sql .= "Disciplina LIKE '%{$palavra}%' OR Descricao LIKE '%{$palavra}' OR TIPO LIKE '%{$palavra}%' ";
         }

         if(is_numeric($palavra))
         {
            $sql.= "OR Periodo LIKE'%{$palavra}%' OR NCreditos LIKE '%{$palavra}%' OR CH LIKE '%{$palavra}%'";
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

      public function exibir_disciplina(  $disciplina  ){
         return $this->select('Disciplina', $disciplina);
      }

      public function exibir_descricao( $disciplina ){
         return $this->select('Descricao', $disciplina);
      }

      public function exibir_periodo( $disciplina ){
         return $this->select( 'Periodo', $disciplina);
      }

      public function exibir_tipo(  $disciplina ){
         return $this->select( 'Tipo', $disciplina);
      }

      public function exibir_ncreditos(  $disciplina ){
         return $this->select( 'NCreditos', $disciplina);
      }

      public function exibir_cargahoraria(  $disciplina ){
         return $this->select( 'CH', $disciplina);
      }

      public function procurar( $palavra ){
         return $this->search($palavra);
      }

      public function exibir_disciplinas(){         
         return $this->select("", "");         
      }

      public function inserir_disciplina( $codigo, $descricao, $periodo, $tipo, $ncreditos, $ch ){
         return $this->insert( $codigo, $descricao, $periodo, $tipo, $ncreditos, $ch );             
      }

      public function atualizar_disciplina( $codigo, $descricao, $periodo, $tipo, $ncreditos, $ch ){
         return $this->update( $codigo, $descricao, $periodo, $tipo, $ncreditos, $ch );         
      }

      public function excluir_disciplina( $codigo ){
         return $this->delete( $codigo );         
      }

      public function __destruct(){
         $this->conn->close();
      }

   }


?>