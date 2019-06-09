<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/FornecedorModel.php')) require_once '../dao/FornecedorModel.php';


$sql = new Connection();


$id = isset($_POST['id']) ? $_POST['id'] : '';
$data = isset($_POST['data']) ? $_POST['data'] : '';

$provider = new FornecedorModel();
$provider->setId($id);
$provider->remove($provider);
