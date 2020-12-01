<?php

$host = "localhost";
$user = "3daw";
$password = "mysql123";
$dbname = "";

$tabelas = file_get_contents("source/source.sql");
$inserts = file_get_contents("source/population.sql");

try{

    $conn = new mysqli( $host, $user, $password );
    if($conn->connect_error){
        throw new MyException('foo!');
    }

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        if(isset($_POST["populando"])){

                $dbname = $_POST["populando"];
                $sql = "CREATE DATABASE {$dbname}";
                if($result = $conn->query($sql)){

                    echo "Banco de dados criado com sucesso!";
                }
                else{
                    throw new Exception('var!');
                }
            }
            else{
                $sql = "CREATE DATABASE 3dawdb";
                if($result = $conn->query($sql)){

                    echo "Banco de dados 3dawdb criado com sucesso!";
                }
                else{
                    throw new Exception('var!');
                }
            }

            //Criando as tabelas
            if($createTab = $conn->query($tabelas)){

                echo "Tabelas criadas com sucesso!";

                if($createPop = $conn->query($inserts)){

                    echo "Inserções feitas corretamente!";
                }
                else{
                    throw new Exception('Não foi possivel popular as tabelas!');
                }
            }
            else {
                throw new Exception('Não foi possivel criar as tabelas!');
            }

    }
    
    

    $conn->close();


}
catch(Exception $e)
{
    echo "Error" . $e->getMessage();
}






?>