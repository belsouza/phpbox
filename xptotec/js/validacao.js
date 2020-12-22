// JavaScript Document

let solicitar = document.getElementById("solicitar");

function validadia(){
	
	var diacompleto = this.value;
	var data = diacompleto.split("-");
	//data[0] === ano
	
	var t = new Date();
	if(data[0] > t.getFullYear() ){
		alert("Ano invalido");		
	}
	
}


function consultardata(){
	
  "use strict";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
		
		var texto = this.responseText;
		if( texto.length > 10){
			
			alert(this.responseText);			
		}
      	else{
			
			solicitar.setAttribute("action","escolha_carro.php");
			solicitar.submit();
			
		}
    }
  };
  xhttp.open("POST", "actions/r_solicitar.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("cidade="+cidade.value+"&retirada="+retirada.value+"&hora_retirada="+hora_retirada.value+"&devolucao="+devolucao.value+"&hora_devolucao="+hora_devolucao.value+"");	
}



document.getElementById("retirada").addEventListener("blur",validadia, true);

document.getElementById("devolucao").addEventListener("blur",validadia, true);

document.getElementById("alugue").addEventListener("click", function(){
	"use strict";
	
	
	var local = document.getElementById("cidade").value;
	var diaretirada = document.getElementById("retirada").value;
	var horaretirada = document.getElementById("hora_retirada").value;
	var diadevolucao = document.getElementById("devolucao").value;
	var horadevolucao = document.getElementById("hora_devolucao").value;
	
	var message = "";
	
	if(local === ""){
		message = message + "Escolha um local, por favor!\n";
	}
	
	if(diaretirada === ""){
		message = message + "Escolha um um dia para retirada\n";
	}
	
	if(horaretirada === ""){
		message = message + "Escolha um horario valido!\n";
	}
	
	if(diadevolucao === ""){
		message = message + "Escolha um dia para devolução, por favor!\n";
	}
	
	if(horadevolucao === ""){
		message = message + "Escolha um horario valido!\n";
	}
	
	if((local === "")||(diaretirada === "") || (horaretirada === "") ||(diadevolucao === "") ||(horadevolucao === "")){
		alert(message);
	}
	else{
		consultardata();
	}	
	
});


