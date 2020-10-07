<?php

$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$database = "";

$conn = new mysqli($servername, $username, $password);
if($conn->connect_error){
    die ("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["dbname"])){

    $database = $_POST["dbname"];
	
    $sql = "CREATE DATABASE $database";
    if( $conn->query($sql) === TRUE){
        echo "Banco criado";
    }
    else{
        echo "Erro";
    }
}
else{
    echo "Metodo errado";
}


?>