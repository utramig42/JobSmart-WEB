<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';

new UsuarioControllerAdd();

class UsuarioControllerAdd
{

    public function __construct()
    {
        $this->setDataUserPersonal();
        $this->setAddress();
        $this->isTemp();
        $this->setDataUserGeneral();
        $this->user->insert($this->user);
    }

    public function setDataUserPersonal()
    {
        $this->nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $this->cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
        $this->salario = isset($_POST['salario']) ? $_POST['salario'] : '';
        $this->cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
        $this->dataNascimento = isset($_POST['data-nascimento']) ? $_POST['data-nascimento'] : '';
        $this->telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    }

    public function setAddress()
    {
        $logradouro = isset($_POST['logradouro']) ? $_POST['logradouro'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
        $complemento = isset($_POST['complemento']) ? '- ' . $_POST['complemento'] : '';
        $bairro = isset($_POST['bairro']) ?  $_POST['bairro'] : '';
        $this->uf = isset($_POST['uf']) ? $this->setEstado($_POST['uf']) : '';
        $this->cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';

        $this->endereco = "$logradouro , $numero $complemento - $bairro, $this->cidade - $this->uf, $cep ";
    }

    public function isTemp()
    {

        $this->temp = isset($_POST['dataResc']) ? 1 : 0;
        $this->dataRes = $_POST['dataResc'] == null && $_POST['dataResc'] == ''  ? null : $_POST['dataResc'];
    }


    public function setDataUserGeneral()
    {
        $this->user = new UsuarioModel();
        $this->user->setNome($this->nome);
        $this->user->setCargo(intval($this->cargo));
        $this->user->setSalario(floatval($this->salario));
        $this->user->setCpf($this->cpf);
        $this->user->setDataNascimento($this->dataNascimento);
        $this->user->setTel($this->telefone);
        $this->user->setEndereco($this->endereco);
        $this->user->setUf($this->uf);
        $this->user->setCidade($this->cidade);
        $this->user->setTemporario($this->temp);
        $this->user->setDataRecisao($this->dataRes);
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