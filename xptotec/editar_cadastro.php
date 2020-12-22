<?php include_once "actions/r_session.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Falls Car</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/editar_cadastro_style.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet" >
        <script src="js/login.js" defer></script>
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
				
				    
			
				 	<form id="cadastrar" method="post" action="cadastro_enderecos.php">
						
					<h1>Editar Dados</h1>	

					<div class="line">
						<label>Nome</label>
						<input type="text" id="nome" name="nome" placeholder="Nome" >                
					</div>

					<div class="line">
						<label>CPF</label>
						<input type="text" id="cpf" name="cpf" placeholder="CPF" >                
					</div>

					<div class="line">
						<label>Data de Nascimento</label>
						<input type="date" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento" >                
					</div>
					 
					 <div class="line">
						<label>Celular</label>
						<input type="tel" id="celular" name="celular" placeholder="Telefone Celular" >                
					</div>
					 
					 <div class="line">
						<label>Senha</label>
						<input type="password" id="senha" name="senha" placeholder="senha" >                
					</div>
						
					<div class="line sp">
						<div class="col">
							<label for="uf">UF</label>
							<select id="uf">
								<option value="">Escolha um</option>
							</select>				 
						</div>

						 <div class="col">
							<label for="uf">Cidade</label>
							<select id="cidade">
								<option value="">Escolha um</option>
							</select>				 
						</div>						 
						 
					</div>
					 
					 <div class="col">
							<label>CEP</label>
							<input type="text" id="cep" name="cep" placeholder="CEP" >                
						</div>
					 
					 <div class="line">
						 <div class="col">
							<label>Bairro</label>
							 <input type="text" name="bairro" id="bairro" placeholder="Bairro" />					 
						 </div>
					 
					 </div>
					 
					 
					 <div class="line">
						 <div class="col">
						 <label>Rua</label>
						 <input type="text" name="rua" id="rua" placeholder="Rua" />	
						 </div>
						 
						 <div class="col">
						 <label>Número</label>
						 <input type="text" name="numero" id="numero" placeholder="Numero" />	
						 </div>					 					 
					 </div>
					 
					 <div class="line">
					 	 <div class="col">
						 <label>Complemento</label>
						 <input type="text" name="complemento" id="complemento" placeholder="Complemento" />	
						 </div>
					 </div>
					 
					  <div class="line">
					 	 <div class="col">
						 <label>Telefone Fixo</label>
						 <input type="text" name="telefixo" id="telefixo" placeholder="Telefone Fixo" />	
						 </div>
					 </div>
					 
					 <div>
					 	<input type="hidden" name="nome" value="<?php echo $nome; ?>"/>
					 	<input type="hidden" name="cpf" value="<?php echo $cpf; ?>"/>
						<input type="hidden" name="data_nascimento" value="<?php echo $data_nascimento; ?>"/>
						<input type="hidden" name="celular" value="<?php echo $celular; ?>"/>
						<input type="hidden" name="senha" value="<?php echo $senha; ?>"/>
					 </div>
										

					<button type="submit">Continuar</button>

				</form>	
			
			</section>
			
			<footer>
			 <p>All Might</p>
			
			</footer>          
        
        </article>
    </body>
</html>