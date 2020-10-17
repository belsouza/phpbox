<?php

require_once "actions/response_construir.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Construir Banco de Dados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
        <link href="css/setting_style.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
		<article id="container">
			<header>
				<h1>Configurações Iniciais</h1>
				
				<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="construir_banco.php">Construir</a></li>
					<li><a href="exibir_alunos.php">Exibir</a></li>
					<li><a href="insere_aluno.php">Inserir</a></li>
					<li><a href="atualizar_aluno.php">Atualizar</a></li>
					<li><a href="excluir_aluno.php">Excluir</a></li>
				
				</ul>
				</nav>	
				
			</header>
			<article id="content">
				<form method="POST"  enctype="multipart/form-data" id="formulario" >
					<div class="idata">
						<label>Nome do Banco de Dados: </label>
						<input type="text" name="dbname" id="dbname" required placeholder="Insira um nome" />					
					</div>
					
					<div class="idata">
						<label>Importar tabelas:</label>
						
						<input type="checkbox" checked id="tem_tabelas" ><br/>
						<input type="file" name="tabelas" id="tabelas" disabled />					
					</div>
					
					<div class="idata">
						<label>Importar registros: </label>
						
						<input type="checkbox" checked id="tem_registros" ><br/>
						<input type="file" name="registros" id="registros" disabled />					
					</div>
										
					<input type="submit" value="Enviar">
				</form>	
				
				<section id="showstatus">
					
					<div><?php echo $mensagem_database."<br>"; ?></div>
					<div><?php echo $mensagem_tabelas."<br>";  ?></div>
					<div><?php echo $mensagem_registros."<br>"; ?></div>
					
					
			 	 </section>
			</article>
			<footer>
				<p>3DAW - Faeterj | 2020 </p>			
			</footer>		
		</article>
		<script type="application/javascript">
						
			$(document).ready(function(){
								
				$("#tem_tabelas").click(function(){
					
					if($(this).is(":checked")){
						$("#tabelas").prop("disabled", true);
					}else
					{
						$("#tabelas").prop("disabled", false);
					}					
				});	
				
				$("#tem_registros").click(function(){
					
					if($(this).is(":checked")){
						$("#registros").prop("disabled", true);
					}else
					{
						$("#registros").prop("disabled", false);
					}					
				});				
			});
						
		</script>
    </body>
</html>