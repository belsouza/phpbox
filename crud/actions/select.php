<?php 

require_once "alunos.php";
$tabela = "";
$pages = "";


if(isset($_POST["procurar"]))
{
    $transaction = new Alunos();        
    $transaction->setArguments($_POST["procurar"]);
    $transaction->setLimit(10);
    $tabela = $transaction->exibir_tabela();
}
else
{
    $page = "";
    if(isset($_GET["page"]))
    {
        $page = $_GET["page"];
    }

    $transaction = new Alunos();    
    $transaction->setLimit(10);
    $tabela = $transaction->exibir_tabela();
}








?>