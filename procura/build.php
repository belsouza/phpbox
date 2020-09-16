<?php


//Extrair informações de um arquivo json
function getData($filename){
	$file = file_get_contents($filename, false);		
	$response = json_decode($file, true);
	$content = $response["content"];
	return $content;
}



//retorna um array com os ids
function setRowID( $source ){

	$celldata = array();
	foreach($source as $data){
		array_push($celldata, $data["id"]);
	}	
	return $celldata;
}


//verifica se a palavra procurada esta no array
 function validate( $data, $palavraprocurada ){

	$entrada = strtolower($data);
	$palavra = strtolower($palavraprocurada);

	if(!empty($palavra) && $palavra != "" ){
		if (strpos($entrada, $palavra) !== false) {
			return 'true';
		}
	}		
	return false;
}


//verifica se a palavra procurada esta no array
 function val_word( $data, $palavraprocurada ){

	$entrada = strtolower($data);
	$palavra = strtolower($palavraprocurada);

	if(!empty($palavra) && $palavra != "" ){
		if (strstr($entrada, $palavra) !== false) {
			return 'true';
		}
	}		
	return false;
}
	

//retorna um array com os nomes	
 function setRowNome( $source ){

	$celldata = array();
	foreach($source as $data){
		array_push($celldata, $data["nome"]);
	}	
	return $celldata;
}


//retorna um array com os compositores		
 function setRowCompositor( $source ){

	$celldata = array();
	foreach($source as $data){
		array_push($celldata, $data["compositor"]);
	}	
	return $celldata;
}

//Fornece as linhas da tabela 
//Recebe o id, nome, compositor, array mãe e a palavra procurada
function getRow( $id, $nome, $compositor, $data, $x ){
				
		$rowdata = "";		
		$cont = count($data);	
		
		for($i = 0; $i < $cont; $i++){		
				
			if(!empty($x) and (!is_null($x))){				

				if((validate($nome[$i], $x)) || (validate($compositor[$i], $x) || (validate($id[$i], $x))) ){
					$rowdata .= "<tr>" . "<td>".$id[$i] ."</td>". "<td>". $nome[$i]."</td>" . "<td>".$compositor[$i]."</td>" . "</tr>\n";
				}				
			}else
			{
				$rowdata .= "<tr>" . "<td>".$id[$i] ."</td>". "<td>". $nome[$i]."</td>" . "<td>".$compositor[$i]."</td>" . "</tr>\n";
			}
		}	
	
		return $rowdata;			
}

//Função que constrói a tabela
function buildTable( $linhas ){
		
		$table = "";		
		$table .= "<table id='teste' ><tr><td>ID</td><td>NOME</td><td>COMPOSITOR</td></tr>";
		$table .= $linhas;		
		$table .= "</table>";				
		return $table;		
}

function getCont( $data, $x ){		
	
		$counter = 0;		
				
		for($i = 0; $i < count($data); $i++){
			
			$str = "";
			foreach($data[$i] as $row){
				$str .= $row;
			}
			if(validate($str, $x)){
				$counter++;
			}
		}
		return "<p>Foram achados " . $counter. " registros.</p>";
	
	
}



	


?>