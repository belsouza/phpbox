<?php

class Valida{
	
	private $nome;
	private $idade;
	private $email;
	private $senha;
	
	public function __construct($nome, $idade, $email, $senha){
		
		$this->nome = $nome;
		$this->idade = $idade;
		$this->email = $email;
		$this->senha = $senha;		
	}
	
	public function valida_nome(){
		
		$nome = $this->nome;
		if(!is_numeric($nome) && is_string($nome) && (strlen($nome) > 1) && (!$this->haveNumberChar($nome))){
			return "Olá ".$nome."! ";
		}else
		{
			return false;
		}
	}
	
	
	public function valida_idade(){
		
		$idade = $this->idade;
		if(is_numeric($idade) && ($idade >= 18) && ($idade < 110)){
			return "Sua idade eh: ". $idade;
		}else{
			return false;
		}	
	}
	
	public function valida_email(){
		
		$email = $this->email;
		if(!is_null($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
			return "Seu email eh: ".$email;
		}else{
			return false;
		}
	}
	
	public function valida_senha(){	
		
		$senha = $this->senha;
		if((strlen($senha) > 8) && ($this->haveUpperChar($senha)) && ($this->haveLowerChar($senha)) && ($this->haveSpecialChar($senha))) {
			
			return $senha;
			
		}else{			
			return false;
		}
	}
	
	public function getErrorName(){
		
		$erro = "";
		$nome = $this->nome;
		
		if($nome == NULL){
			$erro .= "O nome não pode estar em branco.";
		}
		
		elseif(is_numeric($nome)){
			$erro .= "O nome deve ter uma sequencia de caracteres valida.";
		}
		
		elseif($this->haveNumberChar($nome)){
			$erro .= "O nome não pode conter caracteres numericos.";
		}
		
		elseif(strlen($nome) <= 1){
			$erro .= "O nome deve ter um comprimento valido.";
		}
		
		return $erro;
	}
	
	public function getErrorIdade(){
		
		$erro = "";
		$idade = $this->idade;
		
		if($idade == NULL){
			$erro .= "A idade não pode estar em branco.";
		}
		
		elseif(!is_numeric($idade)){
			$erro .= "A idade não pode conter caracteres.";
		}
				
		elseif($idade < 18){
			$erro .= "Tem que ser maior de 18 anos.";
		}
		
		elseif($idade > 110){
			$erro .= "Coloque uma idade valida, por favor.";
		}
		
		return $erro;
	}
	
	public function getErrorEmail(){
		
		$erro = "";
		$email = $this->email;
		if(strlen($email) < 1){
			$erro .= "Coloque um email valido.";
		}
		
		elseif(!$this->haveSpecialChar($email)){
			$erro .= "O formato do email esta errado.";
		}
		
		return $erro;
		
	}
	
	public function getErrorPassword(){
		
		$erro = "";
		$senha = $this->senha;
		if(strlen($senha) < 8){
			$erro .= "A senha tem que ter mais de oito digitos.<br/>";
		}
		
		if($this->haveSpecialChar($senha) == false){
			$erro .= "A senha tem que ter um caractere especial.<br/>";
		}
		
		if($this->haveLowerChar($senha) == false){
			$erro .= "A senha tem que ter um caractere minusculo.<br/>";
		}
		
		if($this->haveUpperChar($senha) == false){
			$erro .= "A senha tem que ter um caractere maiusculo.<br/>";
		}
		
		return $erro;
		
	}
	
	private function haveUpperChar( $str ){
		
		$it = 0;
		for($i = 0; $i < strlen($str); $i++){
			if(ctype_upper($str[$i])){
				$it++;
			}
		}
		
		if($it == 0){
			return false;
		}
		
		return true;
	}
	
	
	private function haveSpecialChar( $str ){
		
		$it = 0;
		$signal = array(33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,58,59,60,61,62,63,64,91,92,93,94,95,96,123,124,125,126);
		foreach($signal as $i){
			$it = $it + strpos( $str, chr($i) );		
		}	
		//sem caractere especial
		if($it == 0){
			return false;
		}
		
		return true;
	}
	
	private function haveLowerChar( $str ){
		
		$it = 0;
		for($i = 0; $i < strlen($str); $i++){
			if(ctype_lower($str[$i])){
				$it++;
			}
		}
		
		if($it == 0){
			return false;
		}
		
		return true;
	}
	
	private function haveNumberChar( $str ){
		
		$it = 0;
		for($i = 0; $i < strlen($str); $i++){
			if(is_numeric($str[$i])){
				$it++;
			}
		}
		
		if($it == 0){
			return false;
		}
		
		return true;
		
	}
	
	
	
}












?>