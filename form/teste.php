 <?php

$data = "DDdd#123";


function haveUpperChar( $str ){
		
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
	
	
	function haveSpecialChar( $str ){
		
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
	
	function haveLowerChar( $str ){
		
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


echo haveLowerChar($data);
echo haveSpecialChar($data);
echo haveUpperChar($data);


?>