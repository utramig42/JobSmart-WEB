<?php
require_once 'Sql.php';
class Mostrar
{

    private $conn;
    private $select;
    public function __construct()
    {
        $this->conn = new Sql('localhost', 'v2', 'root', '');
    }

    public function setSelect($selectD)
    {
        $this->select = $this->conn->select($selectD);
    }
    public function getSelect()
    {
        return $this->select;
    }
}

$mostrar = new Mostrar();

$mostrar->setSelect("SELECT * FROM funcionário");

var_dump($mostrar->getSelect());