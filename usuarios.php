<?php
//Configuração
include_once 'includes/config.php';

include_once 'includes/headers/header-init.php';

// CSS
include_once 'includes/headers/header-styles.php';

// Default Navbar
include_once 'includes/navbar/navbar-main.php';

$fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));

// Require Files Users
require_once 'core/dao/Connection.php';
require_once 'core/dao/UsuarioModel.php';

?>

<title>Job'Smart - <?php echo $fileName ?></title>
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
            <?php if (isset($_SESSION['mensagem'])) echo $_SESSION['mensagem']; ?>
            <!-- Data Tables -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table mt-2"></i>
                    <span>Lista de funcionários</span>

                    <div class="d-md-inline-block float-right">

                        <!-- Register Button -->
                        <button type="button" class="btn btn-primary float-right"
                            onclick="window.location.href='cadastroUsuarios.php'">
                            <i class="fas fa-plus text-white icon" aria-hidden="true"></i>
                            <span>Cadastrar</span>
                        </button>

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
                                    <th>Nome Completo</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Cargo</th>
                                    <th>Salário</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tfoot>


                                <?php
                                $userModel = new UsuarioModel();
                                $userModel->listUsersTables();
                                $userModel->listUsersModals();
                                ?>

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
                <div class="card-footer small text-muted">Última atualização - <?php echo date('d/m/Y H:i:s') ?></div>
            </div>
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

<script src="js/controller/TableController.js"></script>

<script>
window.table = new TableController(document.querySelector('#search-table'), document.querySelector('table tfoot'));
</script>