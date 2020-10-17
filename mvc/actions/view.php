<?php

require_once "controller.php";
$matricula = $nome = $cpf = $dataNasc = "";

if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["registro"]))){

    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNasc = $_POST["dataNasc"];


}







?>