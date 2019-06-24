<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UpdatePassword.php')) require_once '../dao/UpdatePassword.php';

new UsuarioControllerUpdatePassword();

class UsuarioControllerUpdatePassword
{
    /**
     * Definindo o objeto.
     * @access protected 
     */
    public function __construct()
    {
        // Deve seguir estritamente esta ordem na chamada.
        $this->setGeneralData();
        $this->setObject();

        $this->object->update($this->object);
    }

    /**
     * Definindo o objeto.
     * @access protected 
     */
    protected function setObject()
    {
        $this->object = new UpdatePassword();
        $this->object->setId($this->id);
        $this->object->setPasswordOld($this->old);
        $this->object->setPasswordNew($this->new);
    }

    /**
     * Definindo os dados a serem atualizados.
     * @access private 
     */
    private function setGeneralData()
    {
        $this->id = $_POST['id'];
        $this->old = $_POST['senhaAtual'];
        $this->new = $_POST['senhaNova'];
    }
}
