<?php
    include_once('includes/headers/header-init.php');
?>

<title>Job'Smart - Atualização de Fornecedor</title>

<?php
    include_once('includes/headers/header-styles.php');
?>

<link rel="stylesheet" href="css/forms.css">

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
                    <a href="index.php">Painel de controle</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="fornecedores.php">Fornecedores</a>
                </li>

                <li class="breadcrumb-item active">
                    Atualização de fornecedor
                    <?php $fileName = 'Fornecedores'; ?>
                </li>
            </ol>

            <div class="card mx-auto">
                <div class="card-header">Dados do fornecedor</div>
                <div class="card-body">
                    <form id="provider">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="number" readonly id="codigo" id="codigo" name="codigo" class="form-control" placeholder="Código" required>
                                        <label for="codigo">Código</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" readonly id="razao-social" id="razao-social" name="razao-social" class="form-control" placeholder="Razão Social" required="required">
                                        <label for="razao-social">Razão Social</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" readonly id="cnpj" id="cnpj" name="cnpj" class="form-control" placeholder="CNPJ" required="required">
                                        <label for="cnpj">CNPJ</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-label-group">
                                        <input type="text" id="nome-fantasia" name="nome-fantasia" class="form-control" placeholder="Nome Fantasia" required="required" autofocus="autofocus">
                                        <label for="nome-fantasia">Nome Fantasia</label>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-label-group">
                                        <select id="uf" name="uf" class="form-control">
                                            <option value="" selected>UF</option>
                                        </select>
                                        <label for="uf" class="d-none">UF</label>
                                    </div>
                                </div>

                                <div class=" col-md-3">
                                    <div class="form-label-group">
                                        <select id="cidade" name="cidade" class="form-control" required="required">
                                            <option value="" selected>Cidade</option>
                                        </select>
                                        <label for="cidade" class="d-none">Cidade</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-label-group">
                                        <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Logradouro" required="required">
                                        <label for="logradouro">Logradouro</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="number" id="numero" name="numero" class="form-control" placeholder="Número" required="required">
                                        <label for="numero">Número</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento" required="required">
                                        <label for="complemento">Complemento</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="nome-contato" name="nome-contato" class="form-control" placeholder="Nome do Contato" required="required">
                                        <label for="nome-contato">Nome do Contato</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="e-mail" name="e-mail" class="form-control" placeholder="E-mail" required="required">
                                        <label for="e-mail">E-mail</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone" required="required">
                                        <label for="telefone">Telefone</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="date" readonly id="data-cadastro" id="data-cadastro" name="data-cadastro" class="form-control" placeholder="Data do Cadastro" required="required">
                                        <label for="data-cadastro">Data do Cadastro</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Atualizar</a>
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
    include('includes/footers/footer-init.php');
    include('includes/footers/footer-modal.php');
    include('includes/footers/footer-scripts.php');
?>

<script src="./js/controller/FormController.js"></script>

<script>
    const form = document.querySelector('#provider');
    window.form = new FormController(form);
</script>

<?php
    include('includes/footers/footer-final.php');
?>