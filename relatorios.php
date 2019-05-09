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
    include_once('includes/navbar/navbar-sidebar.php');

    ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active text-capitalize">
                    <?php
                    $fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
                    echo $fileName;
                    ?>
                </li>
            </ol>

            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Area Chart Example
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-chart-bar"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body">
                            <canvas id="myBarChart" width="100%" height="50"></canvas>
                        </div>
                        <div class="card-footer small text-muted">
                            Updated yesterday at 11:59 PM
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-chart-pie"></i>
                            Pie Chart Example
                        </div>
                        <div class="card-body">
                            <canvas id="myPieChart" width="100%" height="100"></canvas>
                        </div>
                        <div class="card-footer small text-muted">
                            Updated yesterday at 11:59 PM
                        </div>
                    </div>
                </div>
            </div>

            <p class="small text-center text-muted my-5">
                <em>More chart examples coming soon...</em>
            </p>
        </div>
        <!-- /.container-fluid -->


        <?php
        include('includes/footers/footer-init.php');
        include('includes/footers/footer-modal.php');
        include('includes/footers/footer-scripts.php');
        ?>

        <!-- Demo scripts for this page-->
    <script src="vendor/template-scripts/demo/datatables-demo.js"></script>
    <script src="vendor/template-scripts/demo/chart-area-demo.js"></script>
    <script src="vendor/template-scripts/demo/chart-bar-demo.js"></script>
    <script src="vendor/template-scripts/demo/chart-pie-demo.js"></script>

        <?php

        include('includes/footers/footer-final.php');
        ?>