<?php include_once "actions/r_session.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Falls Car</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/cadastro_carro_style.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet" >
        <script src="js/carros.js" defer type="text/ecmascript" ></script>
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
			
				 <form id="cadastrar" method="post" action="actions/r_carrcad.php" enctype="multipart/form-data" >

					<div>
						<label>Marca</label>
						<select id="marca" name="marca" >
							<option value="" >Escolha uma</option>
						</select>						
					</div>

					<div>
						<label>Modelo</label>
						<input type="text" id="modelo" name="modelo" placeholder="Modelo" >                
					</div>

					<div>
						<label>Ano</label>
						<input type="text" id="ano" name="ano" placeholder="Ano" >            
					</div>
					 
					 <div>
						<label>Grupo</label>
						<select id="grupo" name="grupo" >
							<option value="" >Escolha um</option>
						</select>
					</div>
					 
					 <div>
						<label>Versão</label>
						<input type="text" id="versao" name="versao" placeholder="Versão" />
					</div>
					 
					 <div>
						<label>Foto</label>
						<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
						<input type="file" id="foto" name="foto" />
					</div>
					 
					 <div>
						<label>Valor</label>
						<input type="text" id="valor" name="valor" placeholder="Valor(R$)" >      
					</div>
					 
					 <div>
						<label>Estado</label>
						<select id="estado" name="estado" >
							<option value="" selected >Escolha um</option>
							<option value="Alugado" >Alugado</option>
							<option value="Livre" >Livre</option>
							<option value="Reservado" >Reservado</option>
							<option value="Manutenção" >Manutenção</option>
						</select>
					</div>
					 
					 <div id="demo"></div>

					<button type="submit">Continuar</button>

				</form>			
			
			</section>
			
			<footer>
			 <p>All Might</p>			
			</footer>          
        
        </article>
    </body>
</html>