<?php
session_start();
date_default_timezone_set("America/Sao_Paulo");

if (!$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}