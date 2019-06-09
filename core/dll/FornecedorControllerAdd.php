<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/FornecedorModel.php')) require_once '../dao/FornecedorModel.php';

$sql = new Connection();
$razaoSocial = isset($_POST['razao-social']) ? $_POST['razao-social'] : '';
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';
$nome = isset($_POST['nome-fantasia']) ? $_POST['nome-fantasia'] : '';
$uf = isset($_POST['uf']) ? setEstado($_POST['uf']) : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';

// Definindo Endereço 
$logradouro = isset($_POST['logradouro']) ? $_POST['logradouro'] : '';
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$numero = isset($_POST['numero']) ? $_POST['numero'] : '';
$endereco = "$logradouro, $numero - $bairro, $cidade - $uf, $cep ";
// Fim endereço. 

$contato = isset($_POST['nome-contato']) ? $_POST['nome-contato'] : '';
$fixo = isset($_POST['isset']) ? $_POST['isset'] : '';
$cel = isset($_POST['celular']) ? $_POST['celular'] : '';
$cnpj = preg_replace('/[.\/-]/', '', $cnpj);


$provider = new FornecedorModel();
$provider->setRazaoSocial($razaoSocial);
$provider->setCnpj($cnpj);
$provider->setNome($nome);
$provider->setUf($uf);
$provider->setCidade($cidade);
$provider->setEndereco($endereco);
$provider->setContato($contato);
$provider->setTelFixo($fixo);
$provider->setTelCel($cel);

$provider->insert($provider);

function setEstado($id)
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
