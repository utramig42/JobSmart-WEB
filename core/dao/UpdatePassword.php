<?php
session_start();
if (file_exists('Connection.php')) require_once 'Connection.php';

class UpdatePassword
{
    private $Sql;
    private $id;
    private $passwordOld;
    private $passwordNew;

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

    /**
     * Verifica se a senha informada como antiga, está correta.
     * @param Number $id  - ID/Matricula do usuario a qual a senha sera trocada
     * @param String $old - Senha antiga a ser verificada
     * @access private
     * @return bool - Se a senha antiga está correta ou não.
     */
    private function verifyPassword($id, $old)
    {
        $rawQuery = "SELECT 
        senha_acesso
        FROM
            acesso
        WHERE
        senha_acesso = '$old'
            AND mat_fun = '$id'";

        $data = $this->Sql->select($rawQuery);;

        if (count($data) > 0) {
            return true;
        }

        return false;
    }

    /**
     * Redirecionando o usuario para a pagina correta após sucesso.
     * @param Number $id - Matricula do usuario
     * @access protected
     */
    protected function redirect($id)
    {
        if ($id == $_SESSION['user_id']) {
            header('Location: ../../logoutController.php');
        } else {
            header('Location: ../../index.php');
        }
    }

    /**
     * Atualizando no banco de dados.
     * @param UpdatePassword $class Classe para atualização dos dados.
     * @access public
     */
    public function update(UpdatePassword $class)
    {
        $id = $class->getId();
        $old = $class->getPasswordOld();
        $new = $class->getPasswordNew();

        if (!$this->verifyPassword($id, $old)) {
            $_SESSION['msg'] = '<div class="alert alert-danger"> Usuario e/ou Senha não identificado. </div>';
            header('Location: ../../atualizarSenha.php');
            exit;
        }

        try {
            // Atualizando no banco de dados.
            $rawQuery = "UPDATE acesso SET senha_acesso = '$new' WHERE mat_fun = '$id';";
            $this->Sql->update($rawQuery);

            // Informando para qual pagina deve ser redirecionado em caso de sucesso.
            $this->redirect($id);
        } catch (Exception $e) {
            echo $e;
        }
    }
}
