<?php
include_once 'includes/config.php';
include_once 'includes/headers/header-init.php';

// CSS
include_once 'includes/headers/header-styles.php';

// Default Navbar
include_once 'includes/navbar/navbar-main.php';
// Require Files Users
require_once 'core/dao/Connection.php';
require_once 'core/dao/UsuarioModel.php';

$usuarioModel = new UsuarioModel();
?>

<title>Job'Smart - Cadastro de Funcionário</title>

<!-- Form Style CSS -->
<link rel="stylesheet" href="css/forms.css">

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
                <li class="breadcrumb-item">
                    <a href="usuarios.php">Funcionários</a>
                </li>
                <li class="breadcrumb-item active">
                    Cadastro de funcionário
                    <?php $fileName = 'Usuarios'; ?>
                </li>
            </ol>

            <div class="card mx-auto">
                <div class="card-header">Dados do funcionário</div>
                <div class="card-body">
                    <form id="user" method="POST" action="core/dll/UsuarioControllerAdd.php">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-label-group">
                                        <input type="text" id="nome" name="nome" class="form-control"
                                            placeholder="Nome Completo" autofocus="autofocus">
                                        <label for="nome">Nome Completo</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <select id="cargo" name="cargo" class="form-control">
                                            <option value="" selected>Cargo</option>
                                            <?php foreach ($usuarioModel->listCargos() as $cargo) : ?>
                                            <option value="<?php echo $cargo['id_cargo'] ?>">
                                                <?php echo $cargo['nm_cargo'] ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                        <label for="cargo" class="d-none">Cargo</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="number" id="salario" name="salario" class="form-control"
                                            placeholder="Salário">
                                        <label for="salario">Salário</label>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF">
                                        <label for="cpf">CPF</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="date" id="data-nascimento" name="data-nascimento"
                                            class="form-control" placeholder="Data de nascimento">
                                        <label for="data-nascimento">Data de nascimento</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="telefone" name="telefone" class="form-control"
                                            placeholder="Telefone">
                                        <label for="telefone">Telefone</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="cep" name="cep" class="form-control" placeholder="Cep">
                                        <label for="cep">Cep</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="logradouro" name="logradouro" class="form-control"
                                            placeholder="Logradouro">
                                        <label for="logradouro">Logradouro</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="number" id="numero" name="numero" class="form-control"
                                            placeholder="Número">
                                        <label for="numero">Número</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="complemento" name="complemento" class="form-control"
                                            placeholder="Complemento">
                                        <label for="complemento">Complemento</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <select id="uf" name="uf" class="form-control">
                                            <option value="" selected>UF</option>
                                        </select>
                                        <label for="uf" class="d-none">UF</label>
                                    </div>
                                </div>

                                <div class=" col-md-4">
                                    <div class="form-label-group">
                                        <select id="cidade" name="cidade" class="form-control">
                                            <option value="" selected>Cidade</option>
                                        </select>
                                        <label for="cidade" class="d-none">Cidade</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="bairro" name="bairro" class="form-control"
                                            placeholder="Bairro">
                                        <label for="bairro">Bairro</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row" name="temp" id="temp">
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
include_once 'includes/footers/footer-init.php';
include_once 'includes/footers/footer-modal.php';
include_once 'includes/footers/footer-scripts.php';
?>
<script src="./js/utils/IbgeUtils.js"></script>
<script src="./js/utils/CepUtils.js"></script>
<script src="./js/controller/FormController.js"></script>
<script src="./js/addUsers.js"></script>

<?php
include_once 'includes/footers/footer-final.php';
?>