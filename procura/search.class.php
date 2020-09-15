<?php

class Search{
	
	private $source;
	private $found;
	private $filename = "data.json";
	private $cont = 0;
	private $table;
	
	//Obtendo o nome do arquivo
	public function __construct( $found ){
		
		$this->found = $found;
		$this->source = $this->getData($this->filename);		
		$this->table = $this->buildTable();		
	}
	
		
	private function getData($filename){
		$file = file_get_contents($filename, false);		
		$response = json_decode($file, true);
		$content = $response["content"];
		return $content;
	}
	
	private function buildTable(){
		
		$table = "";
		
		if($this->cont > 0){
			$table .= "<table id='teste' ><tr><td>ID</td><td>NOME</td><td>COMPOSITOR</td></tr>";
			$table .= $this->getRow();
			$table .= "</table>";
		}
		else{
			$table .= "<p>Not Fount</p>";
		}		
				
		return $table;
		
	}
	
	public function showTable(){
		return $this->table;		
	}
	
	public function getCont(){
		
		if((!empty($this->found)) && (!is_null($this->found)) && ($this->cont > 0)){
			return "<span>Foram encontrados " . $this->cont . " registros.</span>";
		}		
	}
	
	
	private function validate( $args ){
		
		$entrada = strtolower($args);
		$palavra = strtolower($this->found);
		
		if(!empty($palavra) && $palavra != "" ){
			if (strpos($entrada, $palavra) !== false) {
				return 'true';
			}
		}		
		return false;
	}
	
	
	
	private function getRow(){
				
		$rowdata = "";		
		$id = $this->setRowID();
		$nome = $this->setRowNome();
		$compositor = $this->setRowCompositor();
		$data = $this->found;		
		$this->cont = count($this->source);		
		
		
		if($this->cont > 0)
		{			
			for($i = 0; $i < $this->cont; $i++){
			
				echo "2";
				if(!empty($data) && (!is_null($data))){				

					if(($this->validate($nome[$i])) || ($this->validate($compositor[$i]) || ($this->validate($id[$i]))) ){
						$rowdata .= "<tr>" . "<td>".$id[$i] ."</td>". "<td>". $nome[$i]."</td>" . "<td>".$compositor[$i]."</td>" . "</tr>\n";
					}				
				}else
				{
					
					$rowdata .= "<tr>" . "<td>".$id[$i] ."</td>". "<td>". $nome[$i]."</td>" . "<td>".$compositor[$i]."</td>" . "</tr>\n";
				}
			}			
		}		
		
		return $rowdata;			
	}
	
	private function getFullRow(){
				
		$rowdata = "";		
		$id = $this->setRowID();
		$nome = $this->setRowNome();
		$compositor = $this->setRowCompositor();
		$data = $this->found;		
		$this->cont = count($this->source);		
						
		for($i = 0; $i < $this->cont; $i++){			
			$rowdata .= "<tr>" . "<td>".$id[$i] ."</td>". "<td>". $nome[$i]."</td>" . "<td>".$compositor[$i]."</td>" . "</tr>\n";
		}
		
		return $rowdata;			
	}	
	
	
	private function setRowID(){
		
		$celldata = array();
		foreach($this->source as $data){
			
			array_push($celldata, $data["id"]);
		}	
		return $celldata;
	}
	
	private function setRowNome(){
		
		$celldata = array();
		foreach($this->source as $data){
			array_push($celldata, $data["nome"]);
		}	
		return $celldata;
	}
	
	private function setRowCompositor(){
		
		$celldata = array();
		foreach($this->source as $data){
			array_push($celldata, $data["compositor"]);
		}	
		return $celldata;
	}
	
	

}

?>