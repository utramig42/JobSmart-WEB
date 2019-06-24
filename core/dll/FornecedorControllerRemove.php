<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/FornecedorModel.php')) require_once '../dao/FornecedorModel.php';

new FornecedorControllerRemove();

class FornecedorControllerRemove
{

    public function __construct()
    {
        // Deve seguir estritamente esta ordem na chamada.
        $this->setID();
        $this->setObject();
        $this->provider->remove($this->provider);
    }

    private function setID()
    {
        $this->id = isset($_POST['id']) ? $_POST['id'] : '';
    }

    protected function setObject()
    {
        $this->provider = new FornecedorModel();
        $this->provider->setId($this->id);
    }
}
