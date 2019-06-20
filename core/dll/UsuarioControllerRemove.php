<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';

new UsuarioControllerRemove();

class UsuarioControllerRemove
{
    public function __construct()
    {

        $this->user = new UsuarioModel();
        $this->setDataGeneral();
        $this->setDataModel();
        $this->user->remove($this->user);
    }


    public function setDataGeneral()
    {

        $this->matricula = isset($_POST['mat']) ? $_POST['mat'] : '';
        $this->data = isset($_POST['data']) ? $_POST['data'] : '';
        $this->matricula = isset($_POST['mat']) ? $_POST['mat'] : '';
        $this->data = isset($_POST['data']) ? $_POST['data'] : '';
    }

    public function setDataModel()
    {
        $this->user->setDataRecisao($this->data);
        $this->user->setMatricula($this->matricula);
    }
}