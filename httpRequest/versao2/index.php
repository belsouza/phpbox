<!DOCTYPE html>
<html lang="en">
    <head>
        <title>JQuery Teste</title>
        <meta charset="UTF-8">
		<meta name="Description" content="Conteudo em JQUERY" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
		<link rel="icon" href="img/cuteicecream.png" type="image/png" sizes="16x16" >                        

    </head>
    <body>
		<article id="container">
        <section>
            <h2>JQuery Teste</h2>
            <form id="formulario" action="response.php">
                <div>
                    <label>Nome</label>
                    <input type="text" name="nome" id="nome" required />
                </div>

                <div>
                    <label>Estado</label>
                    <select name="uf" id="uf" >
                        <option value="" selected>Escolha o estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>                     
                    </select>
                </div>
                
                <div>
                    <label>Cidade</label>
                    <select name="cidade" id="cidade" >
                        <option value="" selected>Escolha a cidade</option>    
                    </select>
                </div> 
				
				<button type="button" id="submeter"><span>Submeter</span><img src="img/cuteicecream.png" alt="icecream"></button>
            </form>

            <textarea rows="10" cols="50" id="demo">Nenhum aqui</textarea>

            

        </section>
        
		</article>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript ">
							
			$(document).ready(function(e){
				
				$("#submeter").on("click", function(){
					
					let nome = $("#nome").val();
					let uf = $("#uf").val();
					let cidade = $("#cidade").val();
					var msg = "";
					
					if( nome == "" ){
						msg = msg + "O nome não pode estar vazio. \n";
					}
					
					if( uf == "" ){
						msg = msg + "Selecione um estado. \n";
					}
					
					if( cidade == "" ){
						msg = msg + "Selecione uma cidade. \n";
					}
					
					if((nome == "") || (uf == "") || (cidade == "")){
						alert(msg);
					}				
					else{
						$("#formulario").submit();
						$("#demo").html("Submetido");							
					}	
					
					
				});
				
				//Quando o campo select muda
				$("#uf").on("change", function(e){
					
					//Pega o valor dele, e joga-o para a variavel estado
					$estado = $(this).val();
					
					//Faz o request com o get com a pagina php  e o argumento que vem na url 
					// e joga o resultado para a variavel data
					
					$.get("request.php?uf=" + $estado, function(data){
						
						//A variavel data é string e quebra ela para ser array (pra transformar em json depois ou mudar)
						$cid = data.split("\r\n"); 
						$cidade = "";
						
						//Itera a variavel cid que é um array e separa os dados em chaves e valores
						$.each($cid, function(key, value){
							
							//A variavel cidade declarada anteriormente é montada com os valores iteradas 
							$cidade = $cidade + "<option>" + value + "</option>";
						});
						
						//coloca os options no select cidade
						$("#cidade").append($cidade);
						
						//coloca dentro da div demo os valores do array que foram transformados em json
						$("#demo").html( JSON.stringify($cid, null, 4) );
						
					});						
				}).click (function(){
					//Pra mudar os valores  é necessário resetar os valores. Se não fica a mesma coisa
					$("#cidade").text("<option value='' selected>Escolha a cidade</option>");					
				});				
				
			});
		
		
		</script>  
		 
		
    </body>
</html>