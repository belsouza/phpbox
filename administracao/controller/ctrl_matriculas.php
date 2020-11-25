<?php

    require_once "tabelas/Validar.php";
    require_once "tabelas/TMatriculas.php";
    require_once "tabelas/TDisciplinas.php";
    require_once "tabelas/Tabela.php";

    $consulta = "Hello World";
    $disciplinas = "Nenhuma cadastrada";
    $matricula = "";
    $nome = "";    
    $mensagem = "";
    $editar = FALSE;
    $confirma = "Cadastrar";
    $doptions = "Nenhuma ainda";
    $toptions = "Nenhuma ainda";

    $consulta_matricula = "";
    $consulta_nome = "";
    $consulta_cpf = "";
    $consulta_datanascimento = "";
    $consultatabela = "";

    
    $disciplinas = new Disciplinas();
    $validar = new Validar();
    $matriculas = new Matriculas();

    $m = $matriculas->listar_matriculas();
    $doptions = "";

    foreach($m as $item){
        $doptions .= "<option value='{$item}'>{$item}</option>";
    }

    

        

    if($_SERVER["REQUEST_METHOD"] === 'POST'){


    }



    if(isset($_GET["editar"]) or isset($_GET["excluir"])  ){

        
        if(isset($_GET["editar"])){

            $consulta_matricula =  $_GET["editar"];
            $consulta_nome = $matriculas->exibir_nome( $consulta_matricula );
            $consulta_cpf = $matriculas->exibir_cpf( $consulta_matricula );
            $consulta_datanascimento = $matriculas->exibir_datanascimento(  $consulta_matricula );
            $consultatabela = "";
            $confirma = "Atualizar";
            $editar = TRUE;
        }


        if( isset($_GET["excluir"])){

            $consulta_matricula =  $_GET["excluir"];
            $consulta_nome = $matriculas->exibir_nome( $consulta_matricula );
            $consulta_cpf = $matriculas->exibir_cpf( $consulta_matricula );
            $consulta_datanascimento = $matriculas->exibir_datanascimento(  $consulta_matricula );
            $consultatabela = "";            
            $confirma = "Excluir";
            $editar = TRUE;
        }

        if(isset($_POST["operacao"])){

            if($_POST["operacao"] == "Atualizar"){

                $mensagem = $matriculas->atualizar_aluno( $matricula, $nome, $cpf, $datanascimento );
                $consulta_matricula = $consulta_nome = $consulta_cpf = $consulta_datanascimento = $consultatabela = "";                 
                $editar = FALSE;
            }

            if($_POST["operacao"] == "Excluir"){

                $mensagem = $matriculas->excluir_aluno( $matricula );
                $consulta_matricula = $consulta_nome = $consulta_cpf = $consulta_datanascimento = $consultatabela = "";                 
                $editar = FALSE; 
            }
        }
        
        if($editar == FALSE ){
            $confirma = "Cadastrar";
            $mensagem = "";
        }
        
    }


    if( isset($_GET["procurando"]) and $_GET["procurando"] != ""  )
    {
        $consultatabela = $matriculas->procurar($_GET["procurando"]);
        $tabela = new Tabela( $consultatabela );
        $consulta = $tabela->exibir();
    }
    else{
        $consultatabela = $matriculas->exibir_tudo();
        $tabela = new Tabela( $consultatabela );
        $consulta = $tabela->exibir();
    }
?>