<?php

class Tabela{

    private $table;

    public function __construct( $array ){

        $table = "<table id='tabela' >";

        if(is_array($array))
        {
            $table .= "<thead><tr>";

            $thead = array_keys($array[0]);
            foreach($thead as $title){

                $table .= "<td>{$title}</td>";

            }
            $table .= "<td>Edição</td><td>Exclusão</td>";
            $table .= "</tr></thead>";            
            $table .= "<tbody>";
            for($i = 0; $i < count($array); $i++){

                $keys = array_keys($array[$i]);

                $table.= "<tr>";
                foreach($keys as $key){

                    $table .= "<td>". $array[$i][$key] ."</td>";

                }
                $table .= "<td><a href='alunos.php?editar={$array[$i][ array_key_first($array[0]) ]}'>Editar</a></td>";
                $table .= "<td><a href='alunos.php?excluir={$array[$i][ array_key_first($array[0]) ]}'>Excluir</a></td>";

                $table.= "</tr>";
            }
            $table .= "</tbody>";
            $table .= "</table>";
        }

        if(is_string($array))
        {
            $table = "Nenhum dado encontrado.";
        }
        
        
        $this->table = $table;

    }

    public function exibir(){
        return $this->table;
    }


}




?>