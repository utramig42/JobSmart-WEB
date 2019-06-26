<?php

include_once 'includes/headers/header-init.php';
// CSS
include_once 'includes/headers/header-styles.php';
// Default Navbar
include_once 'includes/navbar/navbar-main.php';

$fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));

if ($_SESSION['user_profile'] == 3) {
    include_once 'includes/error.php';
    exit;
}

// Require Files Providers.
require_once 'core/dao/Connection.php';
require_once 'core/dao/DashboardModel.php';
$dashboard = new DashboardModel();
$dashboard->loadModal();
?>

<title>Job'Smart - Administrativo </title>
<!-- Table Style CSS -->
<!-- <link rel="stylesheet" href="css/tables.css"> -->
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

                <li class="breadcrumb-item"></li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card icon-card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">

                                <i class="fas fa-fw fa-money-bill"></i>
                            </div>
                            <div class="mr-5"> Faturamento do dia <?php echo date('d/m/Y') ?></div>
                            <div class="h2"> <?php echo number_format($dashboard->billingOfDay(), 2) ?> </div
                                class="h1">
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card icon-card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5"> Produto + Vendido do dia <?php echo date('d/m/Y') ?> </div>
                            <div class="h2"> <?php echo $dashboard->productOfDay(); ?> </div>

                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card icon-card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-user"></i>
                            </div>
                            <div class="mr-5"> Funcionário Destaque do dia <?php echo date('d/m/Y') ?> </div>
                            <div class="h2"> <?php echo $dashboard->userOfDay(); ?> </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card icon-card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-exclamation-triangle"></i>
                            </div>
                            <div class="mr-5"> Produtos em quantidade Mínima </div>
                            <div class="h2"><?php echo $dashboard->minimumQuantity(); ?></div>
                        </div>
                        <button class="btn btn-danger card-footer text-white clearfix small z-1" data-toggle="modal"
                            data-target="#minium">
                            <span class="float-left">Veja os Detalhes</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Vendas mensais
                </div>
                <div class="card-body">
                    <canvas id="vendas-mensais" width="100%" height="30"></canvas>

                </div>
                <div class="card-footer small text-muted">
                    Atualizado em <?php echo date('d/m/Y H:i:s') ?>
                </div>
            </div>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Demonstrativo Funcionarios - <?php echo strftime('%B de %Y', strtotime('today')); ?>

                    <div class="d-md-inline-block float-right">

                        <!-- Navbar Search -->
                        <form class="d-none d-md-inline-block form-inline float-right ml-auto mr-0 mr-md-5 my-2 my-md-0"
                            id="search-table">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pesquisar por..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cargo</th>
                                    <th>Número de vendas</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php $dashboard->loadEmployees(); ?>
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Atualizado em <?php echo date('d/m/Y H:i:s') ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php
        include_once 'includes/footers/footer-init.php';
        include_once 'includes/footers/footer-modal.php';
        include_once 'includes/footers/footer-scripts.php';
        ?>

        <script src="js/dashboard.js"></script>
        <script src="js/controller/TableController.js"></script>
        <script>
        window.table = new TableController(
            document.querySelector("#search-table"),
            document.querySelector("table tbody")
        );
        </script>
        <!-- Scripts dos Relatórios entram aqui -->
        <script type="module" src="js/report/ReportController.js"></script>
        <?php
        include_once 'includes/footers/footer-final.php';
        ?>