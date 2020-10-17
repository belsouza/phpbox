<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aula de 6/10/2020</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
        <link href="css/index_style.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>			
		  
		  $( function() {
			$( ".dblock a" ).draggable({ containment: "#content", scroll: false });			  
		  } );
		</script>
    </head>
    <body>
        <article id="container">
            <header>
                <section id="logo">
                    <h2>Welcome, Sir</h2>
                </section>

                <section id="procura">				
                    <!--
                        <div>
						<a id="back"> Voltar </a>
                    </div>
                    <form>
                        <input type="text" name="procurar">
                        <button type="submit"><span>Procurar</span></button>
                    </form>
                    -->
                </section>
            </header>
            <article id="content">
			
				<section class="dblock">
					<a class="dref" href="construir_banco.php"> Montar Estrutura </a>
					<a class="dref" href="exibir_alunos.php"> Exibir Registros </a>
					<a class="dref" href="insere_aluno.php"> Inserir Registros </a>
					<a class="dref" href="atualizar_aluno.php"> Modificar Registros </a>
					<a class="dref" href="excluir_aluno.php"> Excluir Registros </a>				
				</section>
				
				<section class="rblock">
				
				
				
				
				</section>
          </article>
            <footer>
                <p>3DAW - Faeterj | 2020  </p>
            </footer>
        </article>    
    </body>
</html>