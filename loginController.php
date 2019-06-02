<?php
session_start();
require('core/dao/Connection.php');

$sql = new Connection();

$matricula = isset($_POST['inputMatricula']) ? $_POST['inputMatricula'] : '';
$senha = isset($_POST['inputSenha']) ? $_POST['inputSenha'] : '';

if ((empty($matricula)) || (empty($senha))) {
    $_SESSION['empty_fields'] = true;
    header('Location: login.php');
    exit();
}

$query = "SELECT
            a.mat_fun,
            f.nm_fun
        FROM jobsmart.acesso a
            JOIN funcionario f
                ON a.mat_fun = f.mat_fun
        WHERE f.mat_fun = :matricula
            AND a.senha_acesso = :senha;";

$statement = $sql->prepare($query);
$statement->bindParam('matricula', $matricula);
$statement->bindParam('senha', $senha);

$statement->execute();

$users = $statement->fetchAll($sql::FETCH_ASSOC);

if (count($users) <= 0) {
    $_SESSION['auth_error'] = true;
    header('Location: login.php');
    exit();
} else {
    $user = $users[0];
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user['mat_fun'];
    $_SESSION['user_nome'] = $user['nm_fun'];
    header('Location: index.php');
    exit();
}

