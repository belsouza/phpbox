<?php

function validarmatricula( $matricula ){

    if(!is_numeric($matricula))
    {
        return false;
    }
    
    if($matricula == ""){
        return false;
    }
    return $matricula;
}

function validarnome( $nome ){

    if($nome == ""){
        return false;
    }

    return $nome;
}


function validarcpf( $cpf ){

    $tam = strlen($cpf);

    if(($cpf == "") && ($tam < 10)) {
        return false;
    }

    return $cpf;
}

function validardata( $dataNasc ){

    if($dataNasc == ""){
        return false;
    }
    return $dataNasc;
}

function redirecionar( $matricula ){

    if($matricula == ""){
        return "<a class='procura_btn' href='exibir_alunos.php'>Procurar</a>";
    } 
}


function geterro( $param )
{
    return 0;
}

?>