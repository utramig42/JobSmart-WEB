<?php
// Configurações
include_once 'includes/config.php';

include_once 'includes/headers/header-init.php';
// CSS
include_once 'includes/headers/header-styles.php';
// Default Navbar
include_once 'includes/navbar/navbar-main.php';

$fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
?>

<title>Job'Smart - <?php echo $fileName ?> </title>
<!-- Table Style CSS -->
<link rel="stylesheet" href="css/tables.css">

<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once('includes/navbar/navbar-sidebar.php');
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
                    echo $fileName;
                    ?>
                </li>
            </ol>

            <!-- Data Tables -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table mt-2"></i>
                    <span>Lista de fornecedores</span>

                    <div class="d-md-inline-block float-right">

                        <!-- Register Button -->
                        <button type="button" class="btn btn-primary float-right"
                            onclick="window.location.href='cadastroFornecedores.php'">
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
                                    <button class="btn btn-primary" type="submit">
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
                                    <th>CNPJ</th>
                                    <th>Nome Fantasia</th>
                                    <th>Nome do Contato</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td class="text-muted text-truncate">12.345.678/9101-11</td>
                                    <td class="text-muted text-truncate">JB - Alimentos e Bebidas</td>
                                    <td class="text-muted text-truncate">Carlos de Oliveira</td>
                                    <td class="text-muted text-truncate">carlos_oliveira@jbcab.com.br</td>
                                    <td class="text-muted text-truncate">+55 31 91234-5678</td>
                                    <td class="text-truncate">

                                        <!-- Button Trigger Modal -->
                                        <button type="button" class="btn btn-success" data-toggle="modal tooltip"
                                            data-target="#informationModal" title="Mais Informações">
                                            <i class="fas fa-info text-white icon"></i>
                                        </button>

                                        <!-- Button Edit Information -->
                                        <button type="button" class="btn btn-warning ml-1" title="Atualizar Informações"
                                            onclick="window.location.href='atualizarFornecedores.php'">
                                            <i class="fas fa-edit text-white icon"></i>
                                        </button>

                                        <!-- Button Remove Information -->
                                        <button type="button" class="btn btn-danger ml-1" title="Remover Informações"
                                            onclick="window.location.href='.php'">
                                            <i class="fas fa-trash text-white icon"></i>
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
                <div class="card-footer small text-muted">Última atualização - <?php echo date('d/m/Y H:i:s') ?> /div>
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
                    <h4 class="modal-title" id="informationModalLabel">Informações do fornecedor</h4>
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
                        <h5>Razão Social</h5>
                        <p class="text-muted">JB - Comércio de Alimentos e Bebidas Ltda.</p>
                    </div>
                    <div class="modal-item">
                        <h5>CNPJ</h5>
                        <p class="text-muted">12.345.678/9101-11</p>
                    </div>
                    <div class="modal-item">
                        <h5>Nome Fantasia</h5>
                        <p class="text-muted">JB - Alimentos e Bebidas</p>
                    </div>
                    <div class="modal-item">
                        <h5>UF</h5>
                        <p class="text-muted">MG</p>
                    </div>
                    <div class="modal-item">
                        <h5>Cidade</h5>
                        <p class="text-muted">Belo Horizonte</p>
                    </div>
                    <div class="modal-item">
                        <h5>Logradouro</h5>
                        <p class="text-muted">Rua Gustavo Brandão</p>
                    </div>
                    <div class="modal-item">
                        <h5>Número</h5>
                        <p class="text-muted">3298</p>
                    </div>
                    <div class="modal-item">
                        <h5>Complemento</h5>
                        <p class="text-muted">GP02</p>
                    </div>
                    <div class="modal-item">
                        <h5>Bairro</h5>
                        <p class="text-muted">Horta</p>
                    </div>
                    <div class="modal-item">
                        <h5>CEP</h5>
                        <p class="text-muted">12345-678</p>
                    </div>
                    <div class="modal-item">
                        <h5>Nome do Contato</h5>
                        <p class="text-muted">Carlos de Oliveira</p>
                    </div>
                    <div class="modal-item">
                        <h5>E-mail</h5>
                        <p class="text-muted">carlos_oliveira@jbcab.com.br</p>
                    </div>
                    <div class="modal-item">
                        <h5>Telefone</h5>
                        <p class="text-muted">+55 31 91234-5678</p>
                    </div>
                    <div class="modal-item">
                        <h5>Data do Cadastro</h5>
                        <p class="text-muted">01/02/2003</p>
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