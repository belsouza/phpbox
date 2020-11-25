<?php

$recebido_matricula = 'A0001';
$recebido_materia = 'ACH2023';
$recebido_periodo = '2';



$host = "localhost";
$user = "root";
$database = "3dawdb";
$password = "823543";

    try{

        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_errno) {
            $error .= $conn->connect_error;
        }

        //Ver se a materia tem pre-requisito

        $sql = "SELECT COUNT(Pre_requisito) FROM disciplinas_requisitos WHERE Disciplina = '{$recebido}'";
        if($result = $conn->query($sql)){
            $data =  $result ->fetch_row();

            //Se for maior que zero é porque tem dependencias
            if($data > 0){

                //ver o periodo atual do aluno;
                // e ver em todas as materias cursadas por este aluno anteriormente
                //se a materia for do periodo e seus requisitos estiver aprovado, retorna verdadeiro

            }
            
        }
       
        
        
        


    

    }
    catch(Exception $e){
        $this->error .= $e->getMessage();
    }      







?>