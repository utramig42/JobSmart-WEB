<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';

$sql = new Connection();
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
$salario = isset($_POST['salario']) ? $_POST['salario'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$dataNascimento = isset($_POST['data-nascimento']) ? $_POST['data-nascimento'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$logradouro = isset($_POST['logradouro']) ? $_POST['logradouro'] : '';
$numero = isset($_POST['numero']) ? $_POST['numero'] : '';
$uf = isset($_POST['uf']) ? setEstado($_POST['uf']) : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$temp = isset($_POST['dataResc']) ? 1 : 0;
$dataRes = $_POST['dataResc'] == null && $_POST['dataResc'] == ''  ? null : $_POST['dataResc'];
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$complemento = isset($_POST['complemento']) ? '- ' . $_POST['complemento'] : '';
$bairro = isset($_POST['bairro']) ?  $_POST['bairro'] : '';

$endereco = "$logradouro , $numero $complemento - $bairro, $cidade - $uf, $cep ";
$cpf = preg_replace('/[.-]/', '', $cpf);

// var_dump($dataRes);
// exit;

$user = new UsuarioModel();
$user->setNome($nome);
$user->setCargo(intval($cargo));
$user->setSalario(floatval($salario));
$user->setCpf($cpf);
$user->setDataNascimento($dataNascimento);
$user->setTel($telefone);
$user->setEndereco($endereco);
$user->setUf($uf);
$user->setCidade($cidade);
$user->setTemporario($temp);
$user->setDataRecisao($dataRes);


$user->insert($user);

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
