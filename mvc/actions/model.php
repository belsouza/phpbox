<?php 

require_once "alunos.php";

class Model{

    private $model;
    
    public function __construct(){
        $this->model = new Alunos();        
    }

    public function delete( $matricula ){
        return $this->model($matricula);
    }

    public function inserir( $nome, $cpf, $datanasc ){       
        return $this->model->insert( $nome, $cpf, $datanasc);
    }

    public function update($matricula, $nome, $cpf, $datanasc ){
        return $this->model->update($matricula, $nome, $cpf, $datanasc);
    }

    public function select($argument, $page, $limit ){
        return $this->model->select( $argument, $page, $limit );
    }


    public function result(){
        return $this->status;
    }

}





?>