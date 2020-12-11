<?php require_once("connect.php"); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<link rel="stylesheet" href="../css/population.style.css" type="text/css">
	<link rel="icon" href="../img/cuteicecream.png" type="icon/png" >
	<title>Popular Banco de Dados</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			let formulario = $("#popular");
			$(".loading").css("display", "none");
			
			$("#popular").on("submit", function(){				
			
				$.post("connect.php", function(data){
					
					$("#resultados").html(data);
					$(".loading").css("display", "block");
					
				})
				.done( function (){
					$("#cont").html("");
					$(".loading").css("display", "none");
				})
				
				.fail( function() {
					alert("Falhou aqui...");
				});
			});		

		});
	</script>	
	</head>
	<body>
		<article id="container">
			<section class="formulario">

				
				
				<form id="popular" method="post" action="#">
					<h1>Populando Banco de Dados</h1>
					<button id="popularbtn" type="submit">Criar e popular Banco de Dados</button>
					<div class="loading"></div>
					<textarea id="resultados" rows="10" cols="50" >
					<?php
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            $data = new Connection();
                            echo $data->criaEstados();
                            echo $data->criaCidades();
                        }
                    ?>
					
					</textarea>					
				</form>	
				
				<div class='redirecionar' ><a href="../index.php">Voltar para a página Inicial</a></div>
			</section>
					
		</article>	
	</body>
</html>