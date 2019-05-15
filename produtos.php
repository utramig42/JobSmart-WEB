<?php
include_once('includes/headers/header-init.php');
include_once('includes/headers/header-styles.php');
?>

<title> Job'Smart - Administrativo </title>
<link rel="stylesheet" href="css/tables.css">
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
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active text-capitalize">
                    <?php
                    $fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
                    echo $fileName;
                    ?>
                </li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    <span>Lista de Funcionarios</span>


                </div>
                <div class="card-body">
                
                    <!-- Navbar Search -->
                    <form class="form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 mb-5" id="search-table">
                        <div class="input-group mb-1 w-50">
                            <input type="text" class="form-control" placeholder="Pesquisar por..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quant. Mínima</th>
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                    <th>Observações </th>
                                    <th>Ações</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-muted">Pão de doce </th>
                                    <th class="text-muted">2</th>
                                    <th class="text-muted">Pãos Mágicos</th>
                                    <th class="text-muted">Panificadores</th>
                                    <th class="text-muted"> Feitos diriamente. </th>
                                    <th>
                                        <button class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#informationModal">
                                            <i class="fas fa-plus"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="informationModal" tabindex="-1" role="dialog"
                                            aria-labelledby="informationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">Informações do
                                                            Produto</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="modal-item">
                                                            <h5>Id</h5>
                                                            <p class="text-muted">001</p>
                                                            <!-- receberá valor do banco -->
                                                        </div>

                                                        <div class="modal-item">
                                                            <h5>Nome</h5>
                                                            <p class="text-muted">Pão de doce</p>
                                                            <!-- receberá valor do banco -->

                                                        </div>
                                                        <h5>Marca</h5>
                                                        <div class="modal-item">
                                                            <p class="text-muted">Pãos Mágicos</p>
                                                            <!-- receberá valor do
                                                                        banco -->

                                                        </div>
                                                        <div class="modal-item">
                                                            <h5>Categoria</h5>
                                                            <p class="text-muted">Panificadores</p>
                                                            <!-- receberá valor do banco -->
                                                        </div>
                                                        <div class="modal-item">
                                                            <h5>Quantidade minima</h5>
                                                            <p class="text-muted"> 2 </p>
                                                            <!-- receberá valor do banco -->
                                                        </div>
                                                        <div class="modal-item">
                                                            <h5> Data de Cadastro </h5>
                                                            <p class="text-muted"> 01/09/1999
                                                            </p> <!-- receberá valor do banco -->
                                                        </div>
                                                        <div class="modal-item">
                                                            <h5> Observações </h5>
                                                            <p class="text-muted"> Feito diariamente.
                                                            </p> <!-- receberá valor do banco -->
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <nav aria-label="Tabelas apresentado usuarios">
                            <ul class="pagination justify-content-center">
                                <li class=" page-item disabled">
                                    <span class="page-link">Anterior</span>

                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">
                                        1
                                    </a>
                                    <span class="sr-only">(atual)</span>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">
                                        2
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Próximo</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="card-footer small text-muted">Última atualização - 04/05/2019</div>
            </div>



        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->

<?php
include('includes/footers/footer-init.php');
include('includes/footers/footer-modal.php');
include('includes/footers/footer-scripts.php');
?>
<script src="js/controller/TableController.js"></script>
<script>
window.table = new TableController(document.querySelector('#search-table'), document.querySelector('table tfoot'))
</script>
<?php
include('includes/footers/footer-final.php');
?>a