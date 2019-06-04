<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';


$sql = new Connection();

$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
$salario = isset($_POST['salario']) ? $_POST['salario'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$uf = isset($_POST['uf']) ? $_POST['uf'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';


$user = new UsuarioModel();
$user->setMatricula($matricula);
$user->setCargo(intval($cargo));
$user->setSalario(floatval($salario));
$user->setTel($telefone);
$user->setUf($uf);
$user->setCidade($cidade);
$user->setEndereco($endereco);


$user->update($user);