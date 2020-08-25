<?php

setlocale(LC_ALL, 'pt_BR.utf8');

class Aluno{
		
	//retorna uma string ola mundo
	public function getString(){
		return ("Ola Mundo!");
	}
	
	//Função para encapsular a string em html
	public function charting( $str ){
		return "<p>".$str."</p>";
	}
	
	public function typeof( $var ){
		
		if(is_array($var)){
			return "Array";
		}
		
		if(is_int($var)){
			return "Inteiro";
		}
		
		if(is_string($var)){
			return "String";
		}
		
		if(is_float($var)){
			return "Float";
		}
			
	}	
}

$word = new Aluno();
$palavra = $word->getString();


echo $word->charting( "strlen: ". strlen($palavra)); 
echo $word->charting( "str_word_count: ".str_word_count($palavra));
echo $word->charting( "strrev: ". strrev($palavra));
echo $word->charting( "strpos: ". strpos("mundo", $palavra));
echo $word->charting( "str_replace: ".str_replace("Ola", "Hello", $palavra));

echo $word->charting( $word->typeof(15));

$str1 = "Nome: Jessy, Idade: ";
$str2 = 48;


echo "<span>". $str1 . $str2. "</span>";
echo "<p>". $str1 . strval($str2). "</p>";








?>