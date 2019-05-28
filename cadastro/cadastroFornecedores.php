<?php
include_once '../includes/headers/header-init.php';

// CSS
include_once '../includes/headers/header-styles.php';

// Default Navbar
include_once '../includes/navbar/navbar-main.php';
?>

<title>Job'Smart - Cadastro de Fornecedor</title>

<!-- Form Style CSS -->
<link rel="stylesheet" href="css/forms.css">

<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once '../includes/navbar/navbar-sidebar.php';
    ?>

    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Painel de controle</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="fornecedores.php">Fornecedores</a>
                </li>
                <li class="breadcrumb-item active">
                    Cadastro de fornecedor
                    <?php $fileName = 'Fornecedores'; ?>
                </li>
            </ol>

            <div class="card mx-auto">
                <div class="card-header">Dados do fornecedor</div>
                <div class="card-body">
                    <form id="provider">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-label-group">
                                        <input type="text" id="razao-social" name="razao-social" class="form-control"
                                            placeholder="Razão Social" autofocus="autofocus" required>
                                        <label for="razao-social">Razão Social</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="CNPJ"
                                            required>
                                        <label for="cnpj">CNPJ</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-label-group">
                                        <input type="text" id="nome-fantasia" name="nome-fantasia" class="form-control"
                                            placeholder="Nome Fantasia" required>
                                        <label for="nome-fantasia">Nome Fantasia</label>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-label-group">
                                        <select id="uf" name="uf" class="form-control" required>
                                            <option value="" selected>UF</option>
                                        </select>
                                        <label for="uf" class="d-none">UF</label>
                                    </div>
                                </div>

                                <div class=" col-md-3">
                                    <div class="form-label-group">
                                        <select id="cidade" name="cidade" class="form-control" required>
                                            <option value="" selected>Cidade</option>
                                        </select>
                                        <label for="cidade" class="d-none">Cidade</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-5">
                                    <div class="form-label-group">
                                        <input type="text" id="logradouro" name="logradouro" class="form-control"
                                            placeholder="Logradouro" required>
                                        <label for="logradouro">Logradouro</label>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-label-group">
                                        <input type="number" id="numero" name="numero" class="form-control"
                                            placeholder="Número" required>
                                        <label for="numero">Número</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="text" id="complemento" name="complemento" class="form-control"
                                            placeholder="Complemento" required>
                                        <label for="complemento">Complemento</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="text" id="bairro" name="bairro" class="form-control"
                                            placeholder="Bairro" required>
                                        <label for="bairro">Bairro</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="number" id="cep" name="cep" class="form-control" placeholder="CEP"
                                            required>
                                        <label for="cep">CEP</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="nome-contato" name="nome-contato" class="form-control"
                                            placeholder="Nome do Contato" required>
                                        <label for="nome-contato">Nome do Contato</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="e-mail" name="e-mail" class="form-control"
                                            placeholder="E-mail" required>
                                        <label for="e-mail">E-mail</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="telefone" name="telefone" class="form-control"
                                            placeholder="Telefone" required>
                                        <label for="telefone">Telefone</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Cadastrar</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php
include_once '../includes/footers/footer-init.php';
include_once '../includes/footers/footer-modal.php';
include_once '../includes/footers/footer-scripts.php';
include_once '../includes/footers/footer-final.php';
?>

<script src="./js/controller/FormController.js"></script>
<!-- <script src="./js/users.js"></script> -->