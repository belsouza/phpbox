<?php 

include_once "actions/r_session.php";
include_once "actions/r_confirma.php";
include_once "consultas/consulta_carros.php";
include_once "consultas/consulta_agencias.php";

print_r($_POST);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Falls Car</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/reserva_style.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet" >
        <script src="js/faturamento.js" defer></script>
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
				
				<article class="formulario">
					
					<section class="pagamento">
					
						<div>
							<label>Forma de Pagamento</label>
							<select>								
							    <option value="2">Cartão de Débito</option>
								<option value="3">Cartão de Crédito</option>
							</select>	
						</div>
						
						<div>
							<label>Proteção Veicular</label>
							<div class="check">
							<span><input id="protecao" type="checkbox" alt="protecao_veicular"></<span>Desejo adicionar proteção ao meu contrato!</span> 
							</div>
							
						</div>
					
					
					</section>
						
					<section class="secao_forms">
						
						<form id="monetario">
																
						<div>
							<label>Numero do cartão</label>
							<input type="text" id="fp" name="fp" placeholder="Numero do cartão" >		
						</div>
						
						<div>
							<label>Bandeira</label>
							<select id="bandeira">
								<option value="1">Visa</option>
							    <option value="2">Elo</option>
								<option value="3">MasterCard</option>
								<option value="4">American Express</option>
							</select>	
						</div>
						
						<div>
							<label>Data de Expiração</label>
							<input type="text" id="exp" name="exp" placeholder="Expiração" >
						</div>
						
						<div>
							<label>Codigo</label>
							<input type="text" id="cod" name="cod" placeholder="Expiração" >
						</div>
					
					
						<button type="button" id="pagar">Confirmar Pagamento</button>
					
					</form>
					
					<form id="reservar" method="post" action="actions/r_registra.php">						
						<input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>" >		
						<input type="hidden" id="carid" name="carid" value="<?php echo $carid; ?>" >               
					    <input type="hidden" id="agenciaid" name="agenciaid" value="<?php echo $agenciaid; ?>" >  
					    <input type="hidden" id="dataretirada" name="dataretirada" value="<?php echo $dataretirada; ?>" >      
					    <input type="hidden" id="horaretirada" name="horaretirada" value="<?php echo $horaretirada; ?>" >	
					  	<input type="hidden" id="datadevolucao" name="datadevolucao" value="<?php echo $datadevolucao; ?>" >
					  	<input type="hidden" id="horadevolucao" name="horadevolucao" value="<?php echo $horadevolucao; ?>" >

					</form>	
				
					
					
					
					
					</section>
					
					
				
				</article>
				
				<article class="data">
					
					<h2>Subtotal  </h2>
					
					<p>Diária e Hora Extra </p>
					
					<p>Diária: R$<?php echo $diaria; ?></p>
					
						
					<p><strong>Cadastro ID: </strong><?php echo $userid; ?></p>
					<p><strong>Plano Selecionado:</strong> <?php echo $dias; ?> dias</p>  
					<p>
						<span><strong> ID do Carro</strong>: <?php echo $dados["id"]; ?></span><br/>
						<span> <strong>Descrição do Veículo</strong> </span>
						 <span><?php echo $dados["marca"] . $dados["versao"] . $dados["ano"]; ?> </span><br/>
						 <span><strong>Modelo</strong>  <?php echo $dados["modelo"]; ?> </span>
						<figure>
							<img src="img/<?php echo $dados["foto"]; ?>" alt="<?php echo $dados["marca"] .$dados["versao"] .$dados["ano"] ; ?>" >;
						</figure>
						
					<p><strong>Local de Retirada</strong>: <?php echo( "Agência ". $agencia["id"] . "  |  " . $agencia["loja"] . " - " . $agencia["cidade"] ) ?></p>
					<p><strong>Data / Hora de retirada: </strong><?php echo ($dataretirada .", às ". $horaretirada ); ?></p>
					<p><strong>Data / Hora de devolução: </strong><?php echo ($datadevolucao .", às ". $horadevolucao ); ?> </p>	
									
					<p id="adicional">Proteção Parcial: R$0,00 </p>					 
					<p><strong>Taxa Administrativa:</strong> (12%)  ---- <?php echo ("R$ " . $taxa_administrativa);  ?></p>
					
					
					<h1 class="total"> Valor Total: R$
						<span id="valor_total">
							 <?php echo $total; ?> 
						</span>
					</h1>
				
				</article>			 		
			
			</section>
			
			<footer>
			 <p>All Might</p>
			
			</footer>          
        
        </article>
    </body>
</html>