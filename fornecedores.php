<?php
    include_once('includes/headers/header-init.php');

    // CSS
    include_once('includes/headers/header-styles.php');

<title>Job'Smart - Fornecedres</title>
<link rel="stylesheet" href="css/tables.css">

<!-- fornecedores style CSS -->
<link rel="stylesheet" type="text/css" href="css/fornecedores.css">

<?php
    // Default Navbar
    include_once('includes/navbar/navbar-main.php');
?>

<div id="wrapper">

    <!-- Sidebar -->
    <?php
        include_once('includes/navbar/navbar-sidebar.php')
    ?>

    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs ????? -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Painel de controle</a>
                </li>
                <li class="breadcrumb-item active text-capitalize">
                    <?php
                    // Placing Header ?????
                    $fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
                    echo $fileName;
                    ?>
                </li>
            </ol>

            <!-- Data Tables -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    <span>Lista de fornecedores</span>

                    <!-- Register Button -->
                    <button type="button" class="btn btn-primary" href="cadastrarFornecedores.php">
                        <i class="fas fa-plus text-white icon" aria-hidden="true"></i>
                        <span>Cadastrar</span>
                    </button>

                    <!-- Navbar Search -->
                    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pesquisar por..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CNPJ</th>
                                    <th>Nome do Contato</th>
                                    <th>Telefone</th>
                                    <th>E-mail</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td class="text-muted text-truncate">JB - Alimentos e Bebidas</td>
                                    <td class="text-muted text-truncate">12.345.678/9101-11</td>
                                    <td class="text-muted text-truncate">Carlos de Oliveira</td>
                                    <td class="text-muted text-truncate">+55 31 91234-5678</td>
                                    <td class="text-muted text-truncate">carlos_oliveira@jbcab.com.br</td>
                                    <td class="text-truncate">

                                        <!-- Button Trigger Modal -->
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#informationModal">
                                            <i class="fas fa-info text-white icon"></i>
                                        </button>

                                        <!-- Button Edit Information -->
                                        <button type="button" class="btn btn-warning">
                                            <i class="fas fa-edit text-white icon"></i>

                                        </button>

                                        <!-- Button Remove Information -->
                                        <button type="button" class="btn btn-danger">
                                            <i class="fas fa-trash text-white icon"></i>
                                        </button>
                                    </td>
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
                <div class="card-footer small text-muted">Última atualização - 04/05/2019</div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Modal -->
<div class="modal fade" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="informationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="informationModalLabel">Informações do fornecedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Código</h5>
                <p class="text-muted info-bottom-border">001</p>

                <h5>Nome</h5>
                <p class="text-muted info-bottom-border">JB - Alimentos e Bebidas</p>

                <h5>CNPJ</h5>
                <p class="text-muted info-bottom-border">12.345.678/9101-11</p>

                <h5>Razão Social</h5>
                <p class="text-muted info-bottom-border">JB - Comércio de Alimentos e Bebidas Ltda.</p>

                <h5>UF</h5>
                <p class="text-muted info-bottom-border">MG</p>

                <h5>Cidade</h5>
                <p class="text-muted info-bottom-border">Belo Horizonte</p>

                <h5>Endereço</h5>
                <p class="text-muted info-bottom-border">Rua Gustavo Brandão, 329 - Horta, Belo Horizonte - MG, 12345-678, Brasil</p>

                <h5>Nome do Contato</h5>
                <p class="text-muted info-bottom-border">Carlos de Oliveira</p>

                <h5>Telefone</h5>
                <p class="text-muted info-bottom-border">+55 31 91234-5678</p>

                <h5>E-mail</h5>
                <p class="text-muted info-bottom-border">carlos_oliveira@jbcab.com.br</p>

                <h5>Data do Cadastro</h5>
                <p class="text-muted">01/02/2003</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<?php
    include('includes/footers/footer-init.php');
    include('includes/footers/footer-modal.php');
    include('includes/footers/footer-scripts.php');
    include('includes/footers/footer-final.php');
?>