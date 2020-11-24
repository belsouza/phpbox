<?php

    require_once "tabelas/Validar.php";
    require_once "tabelas/Disciplinas_Requisitos.php";
    require_once "tabelas/Tabela.php";

    $consulta = "Hello World";
    $disciplinas = "Nenhuma cadastrada";
    $matricula = "";
    $nome = "";
    $cpf = "";
    $datanascimento = "";
    $mensagem = "";
    $editar = FALSE;
    $confirma = "Cadastrar";

    $consulta_matricula = "";
    $consulta_nome = "";
    $consulta_cpf = "";
    $consulta_datanascimento = "";
    $consultatabela = "";

    $disciplinas_requisitos = new disciplinas_requisitos();
    $validar = new Validar();

    if($_SERVER["REQUEST_METHOD"] === 'POST'){


        if(isset($_POST["inserir"])){

            if(isset($_POST["matricula"])){
                $matricula = $validar->validaMatricula( $_POST["matricula"] );
            }
    
            if(isset($_POST["nome"])){
                $nome = $validar->validaNome( $_POST["nome"] );
            }
    
            if(isset($_POST["cpf"])){
                $cpf = $validar->validaCPF( $_POST["cpf"] );
            }
    
            if(isset($_POST["datanascimento"])){
                $datanascimento = $validar->validaDataNascimento( $_POST["datanascimento"] );
            }
                    
            $mensagem = $disciplinas_requisitos->inserir_aluno( $nome, $cpf, $datanascimento ); 
        }        

    }

             

    if(isset($_GET["editar"]) or isset($_GET["excluir"])  ){

        
        if(isset($_GET["editar"])){

            $consulta_matricula =  $_GET["editar"];
            $consulta_nome = $disciplinas_requisitos->exibir_nome( $consulta_matricula );
            $consulta_cpf = $disciplinas_requisitos->exibir_cpf( $consulta_matricula );
            $consulta_datanascimento = $disciplinas_requisitos->exibir_datanascimento(  $consulta_matricula );
            $consultatabela = "";
            $confirma = "Atualizar";
            $editar = TRUE;
        }


        if( isset($_GET["excluir"])){

            $consulta_matricula =  $_GET["excluir"];
            $consulta_nome = $disciplinas_requisitos->exibir_nome( $consulta_matricula );
            $consulta_cpf = $disciplinas_requisitos->exibir_cpf( $consulta_matricula );
            $consulta_datanascimento = $disciplinas_requisitos->exibir_datanascimento(  $consulta_matricula );
            $consultatabela = "";            
            $confirma = "Excluir";
            $editar = TRUE;
        }

        if(isset($_POST["operacao"])){

            if($_POST["operacao"] == "Atualizar"){

                $mensagem = $disciplinas_requisitos->atualizar_aluno( $matricula, $nome, $cpf, $datanascimento );
                $consulta_matricula = $consulta_nome = $consulta_cpf = $consulta_datanascimento = $consultatabela = "";                 
                $editar = FALSE;
            }

            if($_POST["operacao"] == "Excluir"){

                $mensagem = $disciplinas_requisitos->excluir_aluno( $matricula );
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
        $consultatabela = $disciplinas_requisitos->procurar($_GET["procurando"]);
        $tabela = new Tabela( $consultatabela );
        $consulta = $tabela->exibir();
    }
    else{
        $consultatabela = $disciplinas_requisitos->exibir_disciplinas_requisitos();
        $tabela = new Tabela( $consultatabela );
        $consulta = $tabela->exibir();
    }
?>