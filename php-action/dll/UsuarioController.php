<?php

require_once '../dao/Connection.php';

class UsuarioController
{

    private $Sql;

    public function __construct()
    {
        $this -> Sql = new Connection();
        $this->listUsers();
    }


    public function getAllUsers():array
    {
        $command = "SELECT 
        f.mat_fun AS 'matricula',
        c.nm_cargo AS 'cargo',
        f.nm_fun AS 'nome',
        f.end_fun AS 'endereco',
        f.uf_fun AS 'uf',
        f.cid_fun AS 'cidade',
        f.sal_fun AS 'salario',
        f.cpf_fun AS 'cpf',
        f.tel_fun AS 'telefone',
        f.dt_nasc_fun AS 'data_nasc',
        f.dt_res_fun AS 'data_recisao',
        if(f.temp_ativo_fun,'Sim','Não') AS 'temporario',
        f.dt_admin AS 'data_admissao'
    FROM
        funcionario f
            INNER JOIN
        cargo c ON c.id_cargo = f.id_cargo;";

    return $this -> Sql -> select($command);
    }

    public function listUsers()
    {
        $rows = $this -> getAllUsers();
        foreach ($rows as  $row) {
           foreach($row as $att => $attribute){
             
               echo ucfirst($att)." : ".utf8_encode($attribute)."<br>";
           }

           echo '----------- <br>';
        }
    }

}

$user = new UsuarioController();