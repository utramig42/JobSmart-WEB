<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/FornecedorModel.php')) require_once '../dao/FornecedorModel.php';


$sql = new Connection();


$id = isset($_POST['id']) ? $_POST['id'] : '';
$uf = isset($_POST['uf']) ? $_POST['uf'] : '';
$nome = isset($_POST['nome-fantasia']) ? $_POST['nome-fantasia'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$contato = isset($_POST['nome-contato']) ? $_POST['nome-contato'] : '';
$telFixo = isset($_POST['fixo']) ? $_POST['fixo'] : '';
$telCel = isset($_POST['celular']) ? $_POST['celular'] : '';


$provider = new FornecedorModel();
$provider->setNome($nome);
$provider->setId($id);
$provider->setUf($uf);
$provider->setCidade($cidade);
$provider->setEndereco($endereco);
$provider->setContato($contato);
$provider->setTelFixo($telFixo);
$provider->setTelCel($telCel);


$provider->update($provider);