<?php

$nome = "";
$estado = "";
$cidade = "";

echo "Dados recebidos!";


if($_SERVER["REQUEST_METHOD"] === "GET"){

    if (isset($_GET["nome"])){
        $nome = $_GET["nome"];
    }

    if (isset($_GET["uf"])){
        $estado = $_GET["uf"];
    }

    if (isset($_GET["cidade"])){
        $cidade = $_GET["cidade"];
    }

    echo "<p> Nome : " . $nome ."<br>". "UF: " . $estado . "<br>" . "Cidade: " . $cidade ."</p>"; 


}




?>