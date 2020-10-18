<?php

require_once "alunos.php";

class Tabela{
	
	private $select;
	private $limite;
	private $offset;	
	private $restriction;
	private $size;
	public $pagination = 1;
		
	public function __construct( $limit = "", $offset = "", $restriction = "" ){	
		
		$this->limite = $limit;
		$this->offset = $offset;
		$this->restriction = $restriction;		
		
		$alunos = new Alunos();
		$alunos->consultarPalavra($restriction);
		$alunos->setLimit($limit);
		$alunos->setOffset($offset);
		$this->select = $alunos->select();	
		$this->size = $alunos->numeroRegistros();		
		
	}
	
	
	private function style(){
		
		$style = "style='padding: 10px; background-color: whitesmoke; display: inline-block; text-decoration: none;' ";
		return $style;
	}
	
	public function exibir_tabela(){            

		$data = $this->select;
		$limite = $this->limite;
		$table = ""; 

		if(count($data) > 0){

			$table .= "<table id='tabela'>";
			$table .= "<thead><tr>";
			$table .= "<td>Matricula</td>";
			$table .= "<td>Nome</td>";
			$table .= "<td>CPF</td>";
			$table .= "<td>Data de Nascimento</td>";
			$table .= "<td>Editar</td>";
			$table .= "<td>Excluir</td>";
			$table .= "</tr></thead>";

			for($i = 0; !empty($data[$i]) && ($i < $limite); $i++){

				$table .= "<tr>";                
				$table .= "<td>{$data[$i]['Matricula']}</td>";
				$table .= "<td>{$data[$i]['Nome']}</td>";
				$table .= "<td>{$data[$i]['CPF']}</td>";
				$table .= "<td>{$data[$i]['DataNascimento']}</td>";
				$table .= "<td><a href='atualizar_aluno.php?editar={$data[$i]['Matricula']}'>Editar</a></td>";
				$table .= "<td><a href='excluir_aluno.php?excluir={$data[$i]['Matricula']}'>Excluir</a></td>";
				$table .= "</tr>";
			}

			$table .= "</table>";
		}
		else{
			$table .= "<p>Nenhum resultado encontrado!</p>";
		}

		return $table;
	}

    //*************************************************************
    //  Função getPage - Cria a parte de paginacao - $page_number é o GET page
    //  *************************************************************
    public function exibir_paginacao( $page_number = 1 ){
		
		$plink = "";
		$last = $this->size;
		
		$plink .= "<div class='page_button'>";
		$plink.= "<a href='exibir_alunos.php?page=1'{$this->style()}> &laquo; </a>";
		if($page_number < $last){
			
			for($i = $page_number; $i < $last; $i++){
				
				if($i < 5){
					$plink.= "<a href='exibir_alunos.php?page={$i}' {$this->style()} >{$i}</a>";    
				}			 
			}
			 $plink.= "<a href='exibir_alunos.php?page={$i}' {$this->style()} >...</a>";
        	$plink.= "<a href='exibir_alunos.php?page={$last}' {$this->style()} >{$last}</a>";      
		}
	
       $plink .= "</div>";  
        
        return $plink;
    }
}
?>