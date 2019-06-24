<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/FornecedorModel.php')) require_once '../dao/FornecedorModel.php';

new FornecedorControllerAdd();

class FornecedorControllerAdd
{
    public function __construct()
    {
        $this->addProvider();
        $this->endereco = $this->setEndereco();
        $this->provider->insert($this->provider);
    }

    public function setProviderData()
    {

        $this->razaoSocial = isset($_POST['razao-social']) ? $_POST['razao-social'] : '';

        $this->cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';

        $this->nome = $_POST['nome-fantasia'] != "" ? $_POST['nome-fantasia'] : $this->razaoSocial;

        $this->uf = isset($_POST['uf']) ? $this->setEstado($_POST['uf']) : '';

        $this->cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';

        $this->contato = $_POST['nome-contato'] != "" ? $_POST['nome-contato'] : 'Não informado';

        $this->cel = isset($_POST['celular']) ? $_POST['celular'] : '';
        $this->fixo = $_POST['fixo'] != "" ? $_POST['fixo'] : 'Não informado';
    }

    // Definindo Endereço 
    public function setEndereco()
    {

        $logradouro = isset($_POST['logradouro']) ? $_POST['logradouro'] : '';
        $complemento = isset($_POST['complemento']) ? '- ' . $_POST['complemento'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';

        return "$logradouro, $numero  $complemento - $bairro," . $this->cidade . " - " . $this->uf . ", " . $cep;
    }

    public function addProvider()
    {
        $this->setProviderData();
        $this->provider = new FornecedorModel();
        $this->provider->setRazaoSocial($this->razaoSocial);
        $this->provider->setCnpj($this->cnpj);
        $this->provider->setNome($this->nome);
        $this->provider->setUf($this->uf);
        $this->provider->setCidade($this->cidade);
        $this->provider->setEndereco($this->endereco);
        $this->provider->setContato($this->contato);
        $this->provider->setTelFixo($this->fixo);
        $this->provider->setTelCel($this->cel);
    }



    public function setEstado($id)
    {
        switch ($id) {
            case 11:
                return "RO";
            case 12:
                return "AC";
            case 13:
                return "AM";
            case 14:
                return "RR";
            case 15:
                return "PA";
            case 16:
                return "AP";
            case 17:
                return "TO";
            case 21:
                return "MA";
            case 22:
                return "PI";
            case 23:
                return "CE";
            case 24:
                return "RN";
            case 25:
                return "PB";
            case 26:
                return "PE";
            case 27:
                return "AL";
            case 28:
                return "SE";
            case 29:
                return "BA";
            case 31:
                return "MG";
            case 32:
                return "ES";
            case 33:
                return "RJ";
            case 35:
                return 'SP';
            case 41:
                return 'PR';
            case 42:
                return 'SC';
            case 43:
                return 'RS';
            case 50:
                return 'MS';
            case 51:
                return 'MT';
            case 52:
                return 'GO';
            case 53:
                return 'DF';
        }
    }
}
