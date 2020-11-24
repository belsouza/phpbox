<?php

$conn = new mysqli("localhost", "root", "823543", "3dawtest");
if($conn->connect_errno){
    echo "Error connection database";
    exit(1);
}

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST["matricula"])){

        $matricula = $_POST["matricula"];

        $prequery = "SELECT Matricula FROM Alunos WHERE Matricula={$matricula}";
        $result = $conn->query($prequery);
        if( ($result->num_rows) > 0 ) 
        {
            $conn -> autocommit(FALSE);
            $sql = "DELETE FROM Alunos WHERE Matricula = {$matricula}";
            if(($res = $conn->query($sql)) === TRUE){

                if($conn->commit()){
                    echo "Aluno excluido com sucesso! ";
                    if(($num = $conn->affected_rows) > 0){
                        echo $num . "records";
                    } 
                }
                else{
                    echo "Falha commit";
                    exit(2);
                }                
            }
            else{
                echo "Problema: ". $conn->error;
            }
        }
        else{
            echo "Aluno não encontrado";
            $conn->rollback();
        }

        
        $conn->close();
    
    }

    
}




?>