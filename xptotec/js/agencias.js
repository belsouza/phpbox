// JavaScript Document


let nome = document.getElementById("nome");
let cidade = document.getElementById("cidade");

var cidades = new XMLHttpRequest();
cidades.onload = function(){
	"use strict";
		
	let text = this.responseText;	
	var cidades = [];
	
	JSON.parse(text, (key, value) =>{
		if(key === 'cidade'){
			cidades.push(value);
		}		
	});
	
	var options = "<option selected value=\"\" >Escolha uma cidade </option>";	
	for(var i = 0; i < cidades.length; i++){
		options = options + "<option value=\"" + cidades[i] + "\" >" + cidades[i] + "<options>";
	}
	
	document.getElementById("cidade").innerHTML = options;
		
};

cidades.open("get", "json/cidades.json", true);
cidades.send();



document.getElementById("cadastrar").addEventListener("click", function(){
	
	"use strict";
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			
			alert(this.responseText);
		  	window.location.href = "index.php";
		}
	  };
	  xhttp.open("POST", "actions/r_agcad.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send("nome="+nome.value+"&cidade="+cidade.value+"");
	
});

