<?php
// Configurações
include_once 'includes/config.php';
include_once 'includes/headers/header-init.php';
// CSS
include_once 'includes/headers/header-styles.php';
// Default Navbar
include_once 'includes/navbar/navbar-main.php';

$fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
?>

<title>Job'Smart - <?php echo $fileName ?> </title>

<!-- Global Style CSS -->
<link rel="stylesheet" type="text/css" href="css/global-style.css">

<!-- Table Style CSS -->
<link rel="stylesheet" href="css/tables.css">

<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once 'includes/navbar/navbar-sidebar.php';
    ?>

    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Painel de controle</a>
                </li>
                <li class="breadcrumb-item active text-capitalize">
                    <?php
                    // Placing Header
                    $fileName = 'Dashboard';
                    ?>
                </li>
            </ol>

            <h1 class="text-center text-upper"> Bem-Vindo </h1>
            <p class="text-center h5 d-flex mt-5 justify-content-center mb-5">
                Acesse o menu lateral para ter acesso as funcionalidades do sistema.
            </p>

            <center class="mt-2">
                <img src="img/JOBSMART.png" />
            </center>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php
include_once 'includes/footers/footer-init.php';
include_once 'includes/footers/footer-modal.php';
include_once 'includes/footers/footer-scripts.php';
include_once 'includes/footers/footer-final.php';
?>