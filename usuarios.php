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
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active text-capitalize">
                    <?php
                    $fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
                    echo $fileName;
                    ?>
                </li>
            </ol>

            <!-- Page Content -->
            <h1>Blank Page</h1>
            <hr>
            <p>This is a great starting point for new custom pages.</p>

        </div>
        <!-- /.container-fluid -->

        <?php
        include('includes/footers/footer-init.php');
        include('includes/footers/footer-modal.php');
        include('includes/footers/footer-scripts.php');
        include('includes/footers/footer-final.php');
        ?>