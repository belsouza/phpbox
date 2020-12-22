<?php 
include_once "actions/r_session.php";

$nome = $cpf = $data_nascimento = $celular = $senha = "";
if(isset($_POST["nome"])){
	$nome = $_POST["nome"];
}

if(isset($_POST["cpf"])){
	$cpf = $_POST["cpf"];
}

if(isset($_POST["data_nascimento"])){
	$data_nascimento = $_POST["data_nascimento"];
}

if(isset($_POST["celular"])){
	$celular = $_POST["celular"];
}

if(isset($_POST["senha"])){
	$senha = $_POST["senha"];
}

?>
<!DOCTYPE html>
<html lang="en"><head>
        <title>Falls Car</title>
        <meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/cadastro_enderecos_style.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet" >
		
        <script src="js/enderecos.js" defer ></script>
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
			
				 <form id="cadastrar" method="post" action="actions/r_cadastro.php">				 

										
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
					
					<button type="submit">Cadastrar</button>

				</form>			
			
			</section>
			
			<footer>
			 <p>All Might</p>			
			</footer>          
        
        </article>
    </body>
</html>