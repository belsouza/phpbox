<?php

function valida_nome($nome){
		
	if($nome == "Antônio"){
		return $nome;
	}
	return false;	
}


function valida_senha($senha){	
	if($senha == "123"){
		return $senha;
	}	
	return false;
}

function itclean( $var){
	unset($var);
}


function valida_sessao( $session ){
	
	if(empty($session) and is_null($session) and !isset($session) ){
		return false;
	}else{
		return "Bem vindo, ". $session;
	}
}

function logoff(){
	session_destroy();
	header("Location: index.php");
}

function voltar(){	
	header("Location: index.php");
}


?>