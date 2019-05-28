<?php
    include_once('includes/headers/header-init.php');

    // CSS
    include_once('includes/headers/header-styles.php');

    // Default Navbar
    include_once('includes/navbar/navbar-main.php');
?>

<title>Job'Smart - Cadastro de Funcionário</title>

<!-- Form Style CSS -->
<link rel="stylesheet" href="css/forms.css">

<div id="wrapper">

    <!-- Sidebar -->
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
                    <a href="usuarios.php">Funcionários</a>
                </li>
                <li class="breadcrumb-item active">
                    Cadastro de funcionário
                    <?php $fileName = 'Usuários'; ?>
                </li>
            </ol>

            <div class="card mx-auto">
                <div class="card-header">Dados do funcionário</div>
                <div class="card-body">
                    <form id="user">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-label-group">
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome Completo" autofocus="autofocus" required>
                                        <label for="nome">Nome Completo</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <select id="cargo" name="cargo" class="form-control" required>
                                            <option value="" selected>Cargo</option>
                                        </select>
                                        <label for="cargo" class="d-none">Cargo</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="number" id="salario" name="salario" class="form-control" placeholder="Salário" required>
                                        <label for="salario">Salário</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" required>
                                        <label for="cpf">CPF</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone" required>
                                        <label for="telefone">Telefone</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="date" id="data-nascimento" name="data-nascimento" class="form-control" placeholder="Data de nascimento" required>
                                        <label for="data-nascimento">Data de nascimento</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Logradouro" required>
                                        <label for="logradouro">Logradouro</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="number" id="numero" name="numero" class="form-control" placeholder="Número" required>
                                        <label for="numero">Número</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento" required>
                                        <label for="complemento">Complemento</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <select id="uf" name="uf" class="form-control" required>
                                            <option value="" selected>UF</option>
                                        </select>
                                        <label for="uf" class="d-none">UF</label>
                                    </div>
                                </div>

                                <div class=" col-md-4">
                                    <div class="form-label-group">
                                        <select id="cidade" name="cidade" class="form-control" required>
                                            <option value="" selected>Cidade</option>
                                        </select>
                                        <label for="cidade" class="d-none">Cidade</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" required>
                                        <label for="bairro">Bairro</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row" id="temp">
                                <div class="col-md-2">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="temp">
                                        <label class="form-check-label" for="temp">Temporário?</label>
                                    </div>
                                </div>

                                <div class="col-md-4 " id="parent"></div>
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
    include('includes/footers/footer-init.php');
    include('includes/footers/footer-modal.php');
    include('includes/footers/footer-scripts.php');
    include('includes/footers/footer-final.php');
?>

<script src="./js/controller/FormController.js"></script>
<script src="./js/users.js"></script>