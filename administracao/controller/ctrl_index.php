<?php

if(isset($_POST["populando"]))
{
    $tabelas = file_get_contents("source/source.sql");
    $inserts = file_get_contents("source/population.sql");


    try{

        $conn = new mysqli();

    }
    catch(Exception $e)
    {
        echo "Error";
    }



}


?>