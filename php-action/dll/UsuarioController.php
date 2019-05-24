<?php

require_once 'config.php';

class UsuarioController
{



    public function __construct()
    {

        $this->listUsers();
    }


    public function listUsers()
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
        f.temp_ativo_fun AS 'temporario',
        f.dt_admin AS 'data_admissao'
    FROM
        funcionário f
            INNER JOIN
        cargo c ON c.id_cargo = f.id_cargo WHERE c.id_cargo = ?";

        $sql = new Connection();
        $row = $sql->select($command);


        while ($row) {
            echo $row['matricula'];
        }
    }
}
$user = new UsuarioController();