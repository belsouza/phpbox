<?php

    session_start();

    $option1 = "Nenhum ainda ";
    $option2 = "Nenhum ainda";
    $option3 = "Nenhum ainda";
    $disponiveis = "";
    $nomealuno = "";
    $periodoaluno = "";
    $host = "localhost";
    $user = "root";
    $database = "3dawdb";
    $password = "823543";    
    $content = "";


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

            $option3 = "<option value=''>Escolha um     </option>";
            while ($row = $result->fetch_row()) {
                $option3 .= "<option value='{$row[0]}'>{$row[0]}</option>";
            }
        }       

     
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {

            if (isset($_POST["alunos"])) {

                $_SESSION["matricula"] = $_POST["alunos"];
                $matricula = $_POST["alunos"];
                $consultamatricula = "SELECT Alunos.Nome, MAX( Matriculas.Periodo ) FROM Alunos, Matriculas WHERE Alunos.Matricula = '{$matricula}' AND Matriculas.Matricula = '{$matricula}'";

                $result = $conn->query($consultamatricula);
                $data = $conn->affected_rows;
                $cont = $result->num_rows;

                if ($cont > 0) {
                    $row = $result->fetch_row();
                    $nomealuno = $row[0];
                    $periodoaluno = $row[1];
                    $_SESSION["periodo"] = $row[1];
                }
                
                $option1 = "";
                $listagem = "SELECT disciplinas.disciplina FROM Disciplinas WHERE Disciplinas.Periodo >= '{$row[1]}' UNION SELECT matriculas_cursadas.disciplina FROM matriculas_cursadas WHERE matriculas_cursadas.situacao = 'Reprovado'";
                
                if ($result2 = $conn->query($listagem)) {
                    while ($rows = $result2->fetch_row()) {
                        $option1 .= "<option value='{$rows[0]}'>{$rows[0]}</option>";
                    }
                } 
            } 
            
            //Obtendo a disciplina
            if(isset($_POST["oscar"])){

                $_SESSION["disciplina"] = $_POST["oscar"];
                $materia = $_POST["oscar"];
                $content = "";
                $dados = "SELECT TurmaID, DiaSemana, Horarioinicio, HorarioFim FROM Turmas WHERE Materias='{$materia}'";
                if ($result3 = $conn->query($dados)) {
                    while ($rows = $result3->fetch_row()) {

                        $content .= "<div class='opcoes'>";                         
                        $content .= "<strong >$rows[0]</strong><br>";
                        $content .= "<span>Dia da Semana: {$rows[1]}</span>";
                        $content .= "<span>Inicio: {$rows[2]}</span>";
                        $content .= "<span>Final: {$rows[3]}</span>";
                        $content .= "<a href='javascript:escolher(\"{$rows[0]}\")'>Escolher</a>";
                        $content .= "</div>";

                    }
                } 


            }

        } 

    }
    catch(Exception $e){
        $this->error .= $e->getMessage();
    }      


?>