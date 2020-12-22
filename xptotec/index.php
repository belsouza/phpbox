<?php include_once "actions/r_session.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Falls Car</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet" >
        <script src="js/main.js" defer></script>
		<script src="js/validacao.js" async ></script>
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
			
				 <form id="solicitar" method="post">

					<div>
						<label>Local de Retirada</label>
						<select id="cidade" name="cidade" placeholder="Escolha Cidade, Aeroporto ou Loja" >
							<option value="">Escolha um</option>
						</select>
					</div>

					<div>
						<label>Data de Retirada</label>
						<input type="date" id="retirada" name="retirada" min="" max="" >						
					</div>
					 
					 <div>
						<label>Contrato</label>
						<select id="dias" name="dias" >
							<option selected value="" >-</option>
							<option value="7" >7</option>
							<option value="15" >15</option>
							<option value="30" >30</option>
						</select>
					</div>
					 
					<div>
						<label>Hora de Retirada</label>						
						<input type="time" id="hora_retirada" name="hora_retirada" >
					</div>

					<div>
						<label>Data de Devolução</label>
						<input type="date" id="devolucao" name="devolucao" min="" max="" >                
					</div>
					 
					<div>
						<label>Hora de Devolução</label>						
						<input type="time" id="hora_devolucao" name="hora_devolucao" >
					</div>


					<button type="button" id="alugue">Alugue!</button>

				</form>			
			
			</section>
			
			<footer>
			 <p>All Might</p>
			
			</footer>          
        
        </article>
    </body>
</html>