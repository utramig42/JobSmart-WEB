<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';


// var_dump($_POST);
// exit;

$sql = new Connection();

$user = new UsuarioModel();

$matricula = isset($_POST['mat']) ? $_POST['mat'] : '';
$data = isset($_POST['data']) ? $_POST['data'] : '';

$user->setDataRecisao($data);
$user->setMatricula($matricula);

$user->remove($user);