// JavaScript Document

var numerocartao = document.getElementById("fp"); 
var bandeira = document.getElementById("bandeira"); 
var dataexp = document.getElementById("exp"); 
var cod = document.getElementById("cod");

document.getElementById("protecao").addEventListener("change" , function(){
	"use strict";
	var textovalor = document.getElementById("valor_total").innerHTML;
	var replaceit = 0;
	replaceit = parseFloat(textovalor) + 9.0;
	
	
	if (this.checked){
		document.getElementById("adicional").innerHTML = "Proteção Parcial: (1 x R$ 9,00 )";
		document.getElementById("valor_total").innerHTML = replaceit;
		replaceit = 0;
	}
	else{
		document.getElementById("adicional").innerHTML = "Proteção Parcial: R$0,00";
		document.getElementById("valor_total").innerHTML = textovalor;
		replaceit = 0;
	}
	
	
});


document.getElementById("pagar").addEventListener("click", function(){
	
	"use strict";
	var mensagem = "";
	var sucesso = 0;
	
	if(numerocartao === ""){
		mensagem = mensagem + "Coloque um numero de cartão válido!";
		sucesso += 1;
	}
	
	if(bandeira === ""){
		mensagem = mensagem + "Escolha uma das bandeiras";
		sucesso += 1;
	}
	
	if(dataexp === ""){
		mensagem = mensagem + "Coloque uma data válida!";
		sucesso += 1;
	}
	
	if(cod === ""){
		mensagem = mensagem + "O código é necessário";
		sucesso += 1;
	}
	
	
	
	if(sucesso === 0){
		document.getElementById("reservar").submit();
	}
	else{
		alert(mensagem);
	}
	
	
	
	
});