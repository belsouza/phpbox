

function makecoffee(){
				
	let text = this.responseText;
	var ufs = [];
	var uf = JSON.parse(text, (key, value) =>{
		if(key === "UF"){
			ufs.push(value);
		}
	});

	var options = "<option selected value=\"\" >Escolha uma uf </option>";
	ufs.forEach( function(n){
		options = options + "<option value=\"" + n + "\" >" + n + "<options>";
	});

	document.getElementById("uf").innerHTML = options;
}
			
var coffee = new XMLHttpRequest();
coffee.onload = makecoffee;
coffee.open("get", "json/uf.json", true);
coffee.send();	

document.getElementById("uf").addEventListener("change", function(){
	
	let estado = this.value;
				
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {

		  //Obtendo o conteudo do arquivo json e atribuindo a variavel todos
		  let todos = this.responseText;

		  var cidades = "";	

		  //Fazendo o parse da string json, pra que possamos tratá-la como um array com valores e chaves
		  var nomescidades = JSON.parse(todos);

		  //Iterando o arquivo json
		  nomescidades.forEach((key, value) =>{

			  if(key.UF == estado){
				  cidades = cidades +  key.Cidades;
			  }

			  //alert(key.Cidades);						  
			  //alert(key.UF);
		  });

		  //Convertendo o resultado, em string para um array
		  cidades = cidades.split(",");

		  var options = "";

		  //Iterando cada valor e colocando dentro de um campo option
		  var getoptions = cidades.forEach( (valor) =>{
			  options = options + "<option value=\"" +valor + "\">" +  valor + "</option>";	

		  });						 

		  document.getElementById("cidade").innerHTML = options;
		  document.getElementById("demo").innerHTML = options;
		  	

		}
	  };
	  xhttp.open("GET", "json/uf.json", true);
	  xhttp.send();
	
});


document.getElementById("cep").addEventListener("change", function(){
	
	let cep = this.value;
	let uf = document.getElementById("uf").value;
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {

			  let todos = this.responseText;
			  var rua = "";
			  var bairro = "";
			  
			  var nomescidades = JSON.parse(todos);
			  nomescidades.forEach((key, value) =>{

				  if(key.cep === cep){
					  
					  rua = key.logradouro ;
					  bairro = key.bairro;
				  }
			  });
			
			   document.getElementById("rua").value = rua ;
			   document.getElementById("bairro").value = bairro;


		 } //endif
	  }; //end xhttp
	  xhttp.open("GET", "json/estados/" + uf +".json", true);
	  xhttp.send();
	
	
});