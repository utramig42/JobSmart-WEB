<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/FornecedorModel.php')) require_once '../dao/FornecedorModel.php';

new FornecedorControllerUpdate();
class FornecedorControllerUpdate
{

    public function __construct()
    {
        $this->setGeneralData();
        $this->setObject();
    }

    public function setGeneralData()
    {
        $this->id = isset($_POST['id']) ? $_POST['id'] : '';
        $this->uf = isset($_POST['uf']) ? $_POST['uf'] : '';
        $this->nome = isset($_POST['nome-fantasia']) ? $_POST['nome-fantasia'] : '';
        $this->cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $this->endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $this->contato = isset($_POST['nome-contato']) ? $_POST['nome-contato'] : '';
        $this->telFixo = isset($_POST['fixo']) ? $_POST['fixo'] : '';
        $this->telCel = isset($_POST['celular']) ? $_POST['celular'] : '';
    }

    public function setObject()
    {

        $this->provider = new FornecedorModel();
        $this->provider->setNome($this->nome);
        $this->provider->setId($this->id);
        $this->provider->setUf($this->uf);
        $this->provider->setCidade($this->cidade);
        $this->provider->setEndereco($this->endereco);
        $this->provider->setContato($this->contato);
        $this->provider->setTelFixo($this->telFixo);
        $this->provider->setTelCel($this->telCel);


        $this->provider->update($this->provider);
    }
}
