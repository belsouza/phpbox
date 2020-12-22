
var cidade = document.getElementById("cidade");
var retirada = document.getElementById("retirada");
var hora_retirada = document.getElementById("hora_retirada");
var devolucao = document.getElementById("devolucao");
var hora_devolucao = document.getElementById("hora_devolucao");

function padLeadingZeros(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}


var hj = new Date().toISOString().split('T')[0];
retirada.setAttribute('min', hj);
devolucao.setAttribute('min', hj);

var cidades = new XMLHttpRequest();
cidades.onload = function(){
	"use strict";
		
	let text = this.responseText;
	
	var id=[];
	var cidades = [];
	
	JSON.parse(text, (key, value) =>{
		if(key === 'cidade'){
			cidades.push(value);
		}
		
		if(key === 'id'){
			id.push(value);
		}	
	});
	
	var options = "<option selected value=\"\" >Escolha uma cidade </option>";	
	for(var i = 0; i < cidades.length; i++){
		options = options + "<option value=\"" + id[i] + "\" >" + cidades[i] + "<options>";
	}
	
	document.getElementById("cidade").innerHTML = options;
		
};

cidades.open("get", "consultas/consulta_lista_agencias.php", true);
cidades.send();

document.getElementById("dias").addEventListener("change", function(){
	"use strict";
	var dias = this.value;
	var datacorrente = retirada.value;
	datacorrente = datacorrente.split("-");
	
	var ndia = parseInt(dias) + parseInt(datacorrente[2]);
	var nmes = parseInt(1) + parseInt(datacorrente[1]);
	var nano = parseInt(datacorrente[0]) + 1;	
	var novadata = 0;
	
	if(ndia > 30){
		novadata = datacorrente[0] +"-" + padLeadingZeros(nmes, 2) +"-"+ datacorrente[2];
		
		if(datacorrente[1] === '12'){
			novadata = datacorrente[0] +"-" + datacorrente[1] +"-"+ nano;
		}
	}
	else{
		novadata = datacorrente[0] +"-" + datacorrente[1] +"-"+ padLeadingZeros(ndia, 2);
	}
	
	devolucao.defaultValue = novadata;
});







