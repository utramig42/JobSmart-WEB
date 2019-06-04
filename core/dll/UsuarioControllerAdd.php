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
$uf = isset($_POST['uf']) ? $_POST['uf'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$temp = isset($_POST['dataResc']) ? 1 : 0;
$dataRes = isset($_POST['dataResc']) ? $_POST['dataResc'] : '';

$endereco = $logradouro . " Nº" . $numero . ", " . $_POST['complemento'];
// . " - " . $_POST['bairro'] . " - " . $_POST['cidade'] . "/" . $_POST['uf'];
$cpf = preg_replace('/[.-]/', '', $cpf);


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