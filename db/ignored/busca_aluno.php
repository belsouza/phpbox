<?php

$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$dbname = "3dawTest";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $mat = $_POST["matricula"];
    $sql = "SELECT Matricula, Nome, CPF, DataNascimento FROM Alunos where Matricula = ". $mat;
    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){

        while($linha = $resultado->fetch_assoc()){
            echo "Matricula = " . $linha["Matricula"] . "<br/>";
            echo "<input type='hidden' name='matricula'  value ='" . $linha["Matricula"] . "'/>";

            echo "<input type='text' name='nome'  value ='" . . $linha["Nome"] . "' />";
            echo "Nome = " . $linha["Nome"] . "<br/>";
            echo "CPF = " . $linha["CPF"] . "<br/>";
            echo "Data de Nascimento = " . $linha["Data_Nasc"] . "<br/>";
        }
        echo "Registro inserido";
    }else{
        echo "Aluno não encontrado";
    }

    $conn->close();

}else{
    echo "metodo errado";
}

?>