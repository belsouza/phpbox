// JavaScript Document
function exibirmarcas(){
	"use strict";
	
	let text = this.responseText;
	var marcas = [];
	JSON.parse(text, (key, value) =>{
		if(key === "marca"){
			marcas.push(value);
		}
	});

	var options = "<option selected value=\"\" >Escolha uma marca </option>";
	marcas.forEach( function(n){
		options = options + "<option value=\"" + n + "\" >" + n + "<options>";
	});

	document.getElementById("marca").innerHTML = options;
}


function exibirgrupos(){
	"use strict";
	
	
	let text = this.responseText;	
	var grupos = [];
	var descricoes = [];
	
	JSON.parse(text, (key, value) =>{
		if(key === 'grupo'){
			grupos.push(value)
		}
		
		if(key === 'descricao'){
			descricoes.push(value)
		}
	});
	
	var options = "<option selected value=\"\" >Escolha um grupo </option>";	
	for(var i = 0; i < grupos.length; i++){
		options = options + "<option value=\"" + grupos[i] + "\" >" + grupos[i] +" - " + descricoes[i] + "<options>";
	}	
	
	document.getElementById("grupo").innerHTML = options;
}

var marcas = new XMLHttpRequest();
marcas.onload = exibirmarcas;
marcas.open("get", "json/marcas.json", true);
marcas.send();

var grupos = new XMLHttpRequest();
grupos.onload = exibirgrupos;
grupos.open("get", "consultas/consulta_grupos.php", true);
grupos.send();


