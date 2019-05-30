<?php
include_once 'includes/config.php';
include_once 'includes/headers/header-init.php';
$fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
?>
<title> Job'Smart - <?php echo $fileName ?> </title>
<link rel="stylesheet" href="css/relatorio.css">
<?php
include_once 'includes/headers/header-styles.php';
include_once 'includes/navbar/navbar-main.php';
?>

<div id="wrapper">

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
                    <?php echo $fileName; ?>
                </li>
            </ol>

            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <i class="fas fa-chart-area"></i>
                            Relatório de Vendas Mensais
                        </div>
                        <div class="col-md-6">
                            <form class="filter">
                                <div class="">
                                    <label for="filtroMesVendas">Mês de Referencia</label>
                                </div>
                                <div class="">
                                    <select class="form-control form-control-sm" id="filtroMesVendas">
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="vendas-mensais" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">
                Atualizado em <?php echo date('d/m/Y H:i:s') ?>
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
                        Atualizado em <?php echo date('d/m/Y H:i:s') ?>
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
                        Atualizado em <?php echo date('d/m/Y H:i:s') ?>
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
    include_once 'includes/footers/footer-init.php';
    include_once 'includes/footers/footer-modal.php';
    include_once 'includes/footers/footer-scripts.php';
    ?>

    <!-- Demo scripts for this page-->
    <script src="vendor/template-scripts/demo/datatables-demo.js"></script>

    <!-- Scripts dos Relatórios entram aqui -->
    <script type="module" src="js/report/SalesReportController.js"></script>
    <script src="vendor/template-scripts/demo/chart-bar-demo.js"></script>
    <script src="vendor/template-scripts/demo/chart-pie-demo.js"></script>

    <?php

    include_once 'includes/footers/footer-final.php';
    ?>