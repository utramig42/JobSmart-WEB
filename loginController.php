<?php
session_start();
require_once 'core/dao/Connection.php';

$sql = new Connection();

$matricula = isset($_POST['inputMatricula']) ? $_POST['inputMatricula'] : '';
$senha = isset($_POST['inputSenha']) ? $_POST['inputSenha'] : '';

if ((empty($matricula)) || (empty($senha))) {
    $_SESSION['empty_fields'] = true;
    header('Location: login.php');
    exit;
}

$query = "SELECT 
        a.mat_fun, f.nm_fun,p.id_perfil as 'perfil'
        FROM
        jobsmart.acesso a
            JOIN
        funcionario f ON a.mat_fun = f.mat_fun
            JOIN
        cargo c ON f.id_cargo = c.id_cargo
            JOIN
        perfil p ON p.id_perfil = c.id_perfil
        WHERE f.mat_fun = :matricula
            AND a.senha_acesso = :senha
            AND p.id_perfil BETWEEN 1 AND 3
            AND p.ativo_perfil = 1";

$users = $sql->select($query, array(
    "matricula" => $matricula,
    "senha" => $senha
));


if (count($users) <= 0) {
    $_SESSION['auth_error'] = true;
    header('Location: login.php');
    exit;
} else {
    $user = $users[0];
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user['mat_fun'];
    $_SESSION['user_nome'] = $user['nm_fun'];
    $_SESSION['user_profile'] = $user['perfil'];
    header('Location: index.php');
    exit;
}
