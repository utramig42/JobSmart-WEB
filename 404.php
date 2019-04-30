<?php
include_once('includes/headers/header-init.php');
?>

<title> Job'Smart - Administrativo </title>

<?php
include_once('includes/headers/header-styles.php');
include_once('includes/navbar/navbar-main.php');
?>

<div id="wrapper">

    <?php
    include_once('includes/navbar/navbar-sidebar.php')
    ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">404 Error</li>
            </ol>

            <!-- Page Content -->
            <h1 class="display-1">404</h1>
            <p class="lead">Page not found. You can
                <a href="javascript:history.back()">go back</a>
                to the previous page, or
                <a href="index.html">return home</a>.</p>

        </div>
        <!-- /.container-fluid -->

        <?php
        include('includes/footers/footer-init.php');
        include('includes/footers/footer-modal.php');
        include('includes/footers/footer-scripts.php');
        include('includes/footers/footer-final.php');
        ?>