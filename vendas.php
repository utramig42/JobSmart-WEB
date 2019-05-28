<?php
include_once 'includes/config.php';
include_once 'includes/headers/header-init.php';

// CSS
include_once 'includes/headers/header-styles.php';

// Default Navbar
include_once 'includes/navbar/navbar-main.php';

$fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
?>

<title>Job'Smart - Vendas</title>

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

                    echo $fileName;
                    ?>
                </li>
            </ol>

            <!-- Data Tables -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table mt-2"></i>
                    <span>Lista de vendas</span>

                    <div class="d-md-inline-block float-right">

                        <!-- Navbar Search -->
                        <form class="d-none d-md-inline-block form-inline float-right ml-auto mr-0 mr-md-5 my-2 my-md-0"
                            id="search-form">
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
                                    <th>Forma de Pagamento</th>
                                    <th>Valor</th>
                                    <th>Data e Hora do Cadastro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td class="text-muted">Dinheiro</td>
                                    <td class="text-muted">R$20,00</td>
                                    <td class="text-muted">2019-05-13 20:08</td>
                                    <td>

                                        <!-- Button Trigger Modal -->
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#informationModal">
                                            <i class="fas fa-info text-white icon"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

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
                <div class="card-footer small text-muted">Última atualização - 27/05/2019</div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Modal -->
<div class="modal fade" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="informationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="informationModalLabel">Informações da venda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="modal-item">
                    <h5>Código</h5>
                    <p class="text-muted">001</p>
                </div>
                <div class="modal-item">
                    <h5>Forma de Pagamento</h5>
                    <p class="text-muted">Dinheiro</p>
                </div>
                <div class="modal-item">
                    <h5>Valor</h5>
                    <p class="text-muted">R$20,00</p>
                </div>
                <div class="modal-item">
                    <h5>Itens da venda</h5>
                    <ul class="text-muted">
                        <li>
                            <span>Nome: </span>Pão Doce
                        </li>
                        <li>
                            <span>Quantidade: </span>5
                        </li>
                    </ul>
                </div>
                <div class="modal-item">
                    <h5>Data e Hora</h5>
                    <p class="text-muted">2019-05-13 20:08</p>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'includes/footers/footer-init.php';
include_once 'includes/footers/footer-modal.php';
include_once 'includes/footers/footer-scripts.php';
include_once 'includes/footers/footer-final.php';
?>

<script src="js/controller/TableController.js"></script>

<script>
window.table = new TableController(document.querySelector('#search-form'), document.querySelector('table tfoot'));
</script>