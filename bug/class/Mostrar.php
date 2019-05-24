<?php
    require_once 'config.php';
    class Mostrar{
        
        private $conn;
        private $select;

        public function __construct(){
            $this->conn = new Sql('localhost','jobsmart','root','');
        }
        
        public function setSelect($selectD){
            $this -> select = $this -> conn -> select($selectD);
        }

        public function getSelect(){
            return $this -> select;
        }

        public function imprimir($params = array()){
            for ($i=0; $i < count($this ->getSelect());$i++) { 
                echo  '<tr>';
                
                foreach ($params as  $value) {
                    echo '<td>'.$this ->getSelect()[$i][$value].'</td>';
                }

                echo '<td> <button class="btn btn-primary btn-excluir" > Excluir </button> </td>' ;

                echo '</tr>';

            }
        }
    }  

?>