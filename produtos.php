<?php
//Configuração
include_once 'includes/config.php';

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

// Require Files Users
require_once 'core/dao/Connection.php';
require_once 'core/dao/ProdutoModel.php';

?>

<title> Job'Smart - <?php echo $fileName ?> </title>

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

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Painel de controle</a>
                </li>
                <li class="breadcrumb-item active text-capitalize">
                    <?php
                    // Placing Header
                    $fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
                    echo $fileName;
                    ?>
                </li>
            </ol>

            <!-- Data Tables -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table mt-2"></i>
                    <span> Lista de produtos </span>

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
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                    <th>Quantidade Mínima</th>
                                    <th>Quantidade Atual</th>
                                    <th>Observações</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <?php


                                $maxItens = 10; // Número de itens por pagina.
                                $page = (isset($_GET['pagina']) ? intval($_GET['pagina']) : 0); // Pagina Atual.
                                $pagesSql = $page * $maxItens; // Para pegar o dado de 10 em 10.

                                $produtoModel = new ProdutoModel();
                                $produtoModel->listProductsTables($pagesSql, $maxItens);
                                $produtoModel->listProductsModals($pagesSql, $maxItens);
                                $table = 'produto';

                                ?>


                            </tfoot>
                        </table>
                    </div>

                    <?php include_once 'core/dll/Pagination.php' ?>
                </div>
                <div class="card-footer small text-muted">Última atualização - <?php echo date('d/m/Y H:i:s') ?></div>
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
                <h4 class="modal-title" id="informationModalLabel">Informações do produto</h4>
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
                    <h5>Nome</h5>
                    <p class="text-muted">Pão de doce</p>
                </div>
                <div class="modal-item">
                    <h5>Marca</h5>
                    <p class="text-muted">Pãos Mágicos</p>
                </div>
                <div class="modal-item">
                    <h5>Categoria</h5>
                    <p class="text-muted">Panificadores</p>
                </div>
                <div class="modal-item">
                    <h5>Quantidade Mínima</h5>
                    <p class="text-muted">2</p>
                </div>
                <div class="modal-item">
                    <h5>Observações</h5>
                    <p class="text-muted">Feito diariamente.</p>
                </div>
                <div class="modal-item">
                    <h5>Data do Cadastro</h5>
                    <p class="text-muted">01/09/1999</p>
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
?>
<script src="js/controller/TableController.js"></script>
<script>
window.table = new TableController(
    document.querySelector("#search-table"),
    document.querySelector("table tfoot")
);
</script>
<?php
include_once 'includes/footers/footer-final.php';
?>