<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';

new UsuarioControllerRemove();

class UsuarioControllerRemove
{
    public function __construct()
    {
        // Deve seguir estritamente esta ordem na chamada.
        $this->setDataGeneral();
        $this->setDataModel();
        $this->user->remove($this->user);
    }

    /**
     * Definindo o objeto.
     * @access protected 
     */
    protected function setDataGeneral()
    {
        $this->matricula = isset($_POST['mat']) ? $_POST['mat'] : '';
        $this->data = isset($_POST['data']) ? $_POST['data'] : '';
    }

    /**
     * Definindo os dados a serem desabilitados.
     * @access private 
     */
    private function setDataModel()
    {
        $this->user = new UsuarioModel();
        $this->user->setDataRecisao($this->data);
        $this->user->setMatricula($this->matricula);
    }
}
