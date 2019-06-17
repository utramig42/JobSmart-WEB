<?php
// Configurações
include_once 'includes/config.php';

if ($_SESSION['user_profile'] == 1) {
    include_once 'relatoriosGeral.php';
    exit;
} else if ($_SESSION['user_profile'] == 2) {
    include_once 'relatoriosOperacional.php';
    exit;
} else {
    include_once 'relatoriosAdmin.php';
    exit;
}
