<?php
// Configurações
include_once 'includes/config.php';

if ($_SESSION['user_profile'] == 3) {
    include_once 'home.php';
    exit;
} else {
    include_once 'dashboard.php';
    exit;
}