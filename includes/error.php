<link rel="stylesheet" href="css/error.css">

<?php

include_once 'includes/navbar/navbar-sidebar.php';
echo '
<div class="center-all">
<h4 class="mb-4"> Página não encotrada, volte para a tela anterior </h4>
<div>
<a class="btn btn-primary d-flex justify-content-center text-center" href="index.php">  Voltar para tela inicial </a></div>
</div>';
include_once 'includes/footers/footer-init.php';
include_once 'includes/footers/footer-modal.php';
include_once 'includes/footers/footer-scripts.php';

exit;
