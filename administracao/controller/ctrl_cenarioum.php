<?php

    $option1 = "Nenhum ainda";
    $option2 = "Nenhum ainda";
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
        $optionsselect2 = "SELECT TurmaID FROM Turmas";
        if($result = $conn->query($optionsselect2)){
            while ($row = $result->fetch_row()) {
                $option1 .= "<option value='{$row[0]}'>{$row[0]}</option>";
            }
        }

        
        


    }
    catch(Exception $e){
        $this->error .= $e->getMessage();
    }      


?>