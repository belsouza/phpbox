<?php

$msg = "";

if((isset($_POST["texto"])) and (isset($_POST["nome"]) and !empty($_POST["texto"]) and !empty($_POST["nome"]))){
    $texto = $_POST["texto"];
    $nome = $_POST["nome"];
    $texto = $texto . "\r\n";

    $arquivo = fopen($nome, "w+") or die("Cannot open!");
    fwrite($arquivo, $texto);

    $msg = "Arquivo gerado com sucesso!";
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Exportando arquivos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
		
		<article>
		<header><h1>Gerador de arquivos</h1></header>
        <section>			
            <form method="post">

                <label>Nome do arquivo</label>
                <input type="text" name="nome">

                <label>Texto</label>
                <textarea rows="20" cols="20" name="texto"></textarea>
                <button type="submit">Criar</button>

            </form>   
            <p><?php if(!empty($msg)) { echo $msg; } ?></p>
    </section>
	<footer><p>Registro da aula de 22/09/2020</p></footer>
			</article>
    </body>
</html>
