<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<tr>
    <th>Matricula</th>
    <th>Nome</th>
    <th>CPF</th>
    <th>Data de Nascimento</th>
</tr>

<?php

    $conn = new mysqli("localhost","3daw", "", "3dawtest");
    if($conn->connect_errno){
        echo "Falhou";
        exit();
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $mat = $_POST["matricula"];
        //$sql = "SELECT mat, NOME, cpf, DataNascimento FROM Alunos where mat = " . $mat;
        $sql = "SELECT mat, NOME, cpf, DataNascimento FROM Alunos where mat = " . $mat;
        $resultado = $conn->query($sql);

        if($resultado->num_rows > 0)
        {
            while($linha = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                echo "<td>{$linha["mat"]}</td>";
                echo "<td>{$linha["NOME"]}</td>";
                echo "<td>{$linha["cpf"]}</td>";
                echo "<td>{$linha["DataNascimento"]}</td>";
                echo "<input type=hidden >";
                echo "</tr>";
                
            }            
        }else{
                echo "Aluno não encontrado";
            }
    }else{
        echo "metodo errado";
    }

?>
</body>
</html>