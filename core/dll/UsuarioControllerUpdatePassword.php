<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UpdatePassword.php')) require_once '../dao/UpdatePassword.php';

$id = $_POST['id'];
$old = $_POST['senhaAtual'];
$new = $_POST['senhaNova'];

$class = new UpdatePassword();
$class->setId($id);
$class->setPasswordOld($old);
$class->setPasswordNew($new);

$class->update($class);