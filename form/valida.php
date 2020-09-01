<?php

function valida_nome( $nome ){
	if(!is_numeric($nome) && is_string($nome) && (strlen($nome) > 1)){
		return "Ola ".$nome."! ";
	}else
	{
		return false;
	}
}

function valida_inteiro( $inteiro ){
	if(is_numeric($inteiro) && ($inteiro > 18) && ($inteiro < 110)){
		return "Sua idade eh: ". $inteiro;
	}else{
		return false;
	}
	
}


?>