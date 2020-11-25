<?php
//andrehneves@gmail.com

$matricula = "";
$disciplina = "";
$periodo = "";
$turma = "";
$host = "localhost";
$user = "root";
$password = "823543";
$database = "3dawdb";
$error = "";
$conn = "";


if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $matricula = $_POST["matricula"];
    $disciplina = $_POST["disciplina"];
    $periodo = $_POST["periodo"];
    $turma = $_POST["turma"];    

    try {
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_errno) {
            $error .= $conn->connect_error;
        }

        $sql = "INSERT INTO `matricula_efetiva` (`MAluno`, `MDisciplina`, `Periodo`, `Turma`) VALUES ('{$matricula}', '{$disciplina}', '{$periodo}', '{$turma}')";
        if($conn->query($sql) === TRUE){
            echo "Registro incluido com sucesso";
         } 
         else{
            $error = "Erro: " . $conn->error;
            echo $error;
         }   
    }
    catch(Exception $e ){
        echo "Erro". $e->getMessage();
    }
}




?>