<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';


$sql = new Connection();

$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';

$user->setEndereco($endereco);


$user->update($user);