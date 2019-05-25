<?php
include_once 'includes/headers/header-init.php';
include_once 'includes/headers/header-styles.php';
include_once 'config.php';
?>

<title> Jobsmart - Administrativo </title>
<link rel="stylesheet" href="css/index.css">
<?php
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
                    <a href="#">Dashboard</a>
                </li>

                <?php $fileName = ucfirst(str_replace(".php", '', basename(__FILE__))); ?>
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
                            <div class="h2"> R$ 2.00 </div class="h1">
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
                            <div class="h2"> Sabonete </div>
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
                            <div class="h2"> JobUser </div>
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
                            <div class="h2">2</div>
                        </div>

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
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">
                    Atualizado em <?php echo date('d/m/Y H:i:s') ?>
                </div>
            </div>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Data Table Example
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>

                            </tbody>

                        </table>

                        <!-- Pagination Buttons -->
                        <nav aria-label="Paginação de tabelas dos fornecedores">
                            <ul class="pagination justify-content-center mt-3">
                                <li class=" page-item disabled">
                                    <span class="page-link">Anterior</span>
                                    <!-- <a class="page-link" href="#">Anterior</a> ????? -->
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                    <span class="sr-only">Atual</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Próximo</a>
                                </li>
                            </ul>
                        </nav>
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

        <?php
        include_once 'includes/footers/footer-final.php';
        ?>