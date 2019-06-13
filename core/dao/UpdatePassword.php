<?php
session_start();
if (file_exists('Connection.php')) require_once 'Connection.php';

class UpdatePassword
{
    private $Sql;

    public function __construct()
    {
        $this->Sql = new Connection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function setPasswordOld($value)
    {
        $this->passwordOld = $value;
    }

    public function setPasswordNew($value)
    {
        $this->passwordNew = $value;
    }


    public function getPasswordOld()
    {
        return $this->passwordOld;
    }


    public function getPasswordNew()
    {
        return $this->passwordNew;
    }

    private function verifyPassword($id, $old)
    {
        $rawQuery = "SELECT 
        senha_acesso
        FROM
            acesso
        WHERE
        senha_acesso = '$old'
            AND mat_fun = '$id'";

        $data = $this->Sql->select($rawQuery);

        var_dump($rawQuery);

        if (count($data) <= 0) {
            $_SESSION['msg'] = '<div class="alert alert-danger"> Usuario e/ou Senha não identificado. </div>';
            return true;
        }

        return false;
    }


    public function update($class)
    {
        $id = $class->getId();
        $old = $class->getPasswordOld();
        $new = $class->getPasswordNew();

        if ($this->verifyPassword($id, $old)) {
            header('Location: ../../atualizarSenha.php');
        }
        $rawQuery = "UPDATE acesso SET senha_acesso = '$new' WHERE mat_fun = '$id';";

        $this->Sql->update($rawQuery);
        header('Location: ../../logoutController.php');
    }
}