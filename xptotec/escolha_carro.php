<?php 

include_once "actions/r_session.php"; 
require_once "consultas/consulta_vagas.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Falls Car</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/escolha_carro_style.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet" >
		<script type="text/javascript">
			function martha(x, y){
				document.getElementById("carid").value = x;
				document.getElementById("valor").value = y;
				document.getElementById("escolhercarro").submit();
			}
		
		</script>		
    </head>
    <body>        

        <article id="container">
			
			<header>
				<h1>Falls Car</h1>
				
				
				<section class='informations'>
					<?php echo $contents; ?>							
				</section>
				
			</header>
			
			<section id="contents">
			
				 <article id="escolha" >
					 
					 <section class="vitrine">
					  					 
					 <?php  echo $container; ?>					 
					 </section>
					 
					 <form id="escolhercarro" method="post" action="faturamento.php">
						 
						<input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>" />
						<input type="hidden" id="carid" name="carid" />
						<input type="hidden" id="valor" name="valor" value="<?php echo $valor; ?>" />	
						<input type="hidden" id="agenciaid" name="agenciaid" value="<?php echo $agenciaid; ?>" />	
						<input type="hidden" id="dataretirada" name="dataretirada" value="<?php echo $dataretirada; ?>" />
						<input type="hidden" id="horaretirada" name="horaretirada" value="<?php echo $horaretirada; ?>" />
						<input type="hidden" id="datadevolucao" name="datadevolucao" value="<?php echo $datadevolucao; ?>" />
						<input type="hidden" id="horadevolucao" name="horadevolucao" value="<?php echo $horadevolucao; ?>" />
						<input type="hidden" id="dias" name="dias" value="<?php echo $dias; ?>" />
											 
					 </form>
					

					
				 </article>			
			
			</section>
			
			<footer>
			 <p>All Might</p>
			
			</footer>          
        
        </article>

    </body>
</html>