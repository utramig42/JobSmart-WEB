<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';

new UsuarioControllerRemove();

class UsuarioControllerRemove
{ }

$this->user = new UsuarioModel();

$this->matricula = isset($_POST['mat']) ? $_POST['mat'] : '';
$this->data = isset($_POST['data']) ? $_POST['data'] : '';

$this->user->setDataRecisao($this->data);
$this->user->setMatricula($this->matricula);

$this->user->remove($user);