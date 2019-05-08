<?php
include_once('includes/headers/header-init.php');
include_once('includes/headers/header-styles.php');
?>

<title> Job'Smart - Usúarios </title>

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

                    <!-- Botão de cadastrar -->
                    <a class="btn btn-success" href="cadastroUsuarios.php" role="button">
                        <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                    </a>

                    <!-- Navbar Search -->
                    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
                        id="search-table">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pesquisar por..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
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
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Salário</th>
                                    <th>Temporario</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-muted">José Ribamar </th>
                                    <th class="text-muted">12.345.678-11</th>
                                    <th class="text-muted">+55 31 91234-5678</th>
                                    <th class="text-muted">R$ 2000.42</th>
                                    <th class="text-muted">Sim</th>
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
                                                            Usuario</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Matricula</h5>
                                                        <p class="text-muted">001</p> <!-- receberá valor do banco -->
                                                        <hr> <!--  modificar separador de conteúdo -->
                                                        <h5>Nome</h5>
                                                        <p class="text-muted">José Ribamar</p>
                                                        <!-- receberá valor do banco -->
                                                        <hr> <!-- modificar separador de conteúdo -->
                                                        <h5>CPF</h5>
                                                        <p class="text-muted">12.345.678-11</p>
                                                        <!-- receberá valor do banco -->
                                                        <hr> <!-- modificar separador de conteúdo -->
                                                        <h5>Data de nascimento</h5>
                                                        <p class="text-muted">10/02/1999
                                                        </p> <!-- receberá valor do banco -->
                                                        <hr> <!-- modificar separador de conteúdo -->
                                                        <h5>UF</h5>
                                                        <p class="text-muted">MG</p> <!-- receberá valor do banco -->
                                                        <hr> <!-- modificar separador de conteúdo -->
                                                        <h5>Cidade</h5>
                                                        <p class="text-muted">Belo Horizonte</p>
                                                        <!-- receberá valor do banco -->
                                                        <hr> <!-- modificar separador de conteúdo -->
                                                        <h5>Endereço</h5>
                                                        <p class="text-muted">Rua Gustavo Brandão, 329 - Horta, Belo
                                                            Horizonte - MG, 12345-678, Brasil</p>
                                                        <!-- receberá valor do banco -->
                                                        <hr> <!-- modificar separador de conteúdo -->
                                                        <h5>Telefone</h5>
                                                        <p class="text-muted">+55 31 91234-5678</p>
                                                        <!-- receberá valor do banco -->
                                                        <hr> <!-- modificar separador de conteúdo -->
                                                        <h5>Cargo</h5>
                                                        <p class="text-muted">Vendedor</p>
                                                        <!-- receberá valor do banco -->
                                                        <hr> <!-- modificar separador de conteúdo -->
                                                        <h5>Data do Cadastro</h5>
                                                        <p class="text-muted">01/02/2013</p>
                                                        <!-- receberá valor do banco -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-success" type="button">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" type="button">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

<script src="js/tableSearch.js"> </script>

<?php
include('includes/footers/footer-final.php');
?>