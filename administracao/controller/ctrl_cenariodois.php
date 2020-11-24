<?php

    $option1 = "Nenhum ainda ";
    $option2 = "Nenhum ainda";
    $option3 = "Nenhum ainda";
    $nomealuno = "";
    $periodoaluno = "";
    $host = "localhost";
    $user = "root";
    $database = "3dawdb";
    $password = "823543";


    try{

        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_errno) {
            $error .= $conn->connect_error;
        }

        $option1 = "";
        $optionsselect1 = "SELECT Disciplina FROM Disciplinas";
        if($result = $conn->query($optionsselect1)){
            while ($row = $result->fetch_row()) {
                $option1 .= "<option value='{$row[0]}'>{$row[0]}</option>";
            }
        }

        $option2 = "";
        $optionsselect2 = "SELECT TurmaID FROM turmas";
        if($result = $conn->query($optionsselect2)){
            while ($row = $result->fetch_row()) {
                $option2 .= "<option value='{$row[0]}'>{$row[0]}</option>";
            }
        }

        $option3 = "";
        $optionsselect3 = "SELECT Matricula FROM Alunos";
        if($result = $conn->query($optionsselect3)){
            while ($row = $result->fetch_row()) {
                $option3 .= "<option value='{$row[0]}'>{$row[0]}</option>";
            }
        }

     
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $matricula = $_POST["alunos"];
            $consultamatricula = "SELECT Alunos.Nome, Matriculas.Periodo FROM Alunos, Matriculas WHERE  Alunos.Matricula = '{$matricula}'";
            if($result = $conn->query($consultamatricula)){
                $row = $result->fetch_row();
                $nomealuno = $row[0];
                $periodoaluno = $row[1];
            }         
           
        }

        
        


    }
    catch(Exception $e){
        $this->error .= $e->getMessage();
    }      


?>