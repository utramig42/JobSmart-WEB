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

$userController = new UsuarioModel();

if (!isset($_GET['matricula'])) {
    include_once 'includes/error.php';
}

if ($_SESSION['user_profile'] == 2) {
    include_once 'includes/error.php';
    exit;
}

$data = $userController->loadById($_GET['matricula'])[0];
?>

<title>Job'Smart - Atualização do Usuário</title>

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
                    Atualização do funcionário
                    <?php $fileName = 'Usuarios'; ?>
                </li>
            </ol>

            <div class="card mx-auto">
                <div class="card-header"> <i class="fa fa-user" aria-hidden="true"></i> Dados do usuário
                    <div class="btn-password ">
                        <form action="atualizarSenha.php" method="GET">
                            <input type="hidden" value="<?php echo $data['nm_fun'] ?>" name="name">
                            <input type="hidden" value="<?php echo $data['mat_fun'] ?>" name="mat">
                            <button type="submit" class="btn btn-success"> Atualizar Senha </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2 required-text"> <span class="text-danger"> * </span> Campos obrigários </div>
                    <form id="user" method="post" action="core/dll/UsuarioControllerUpdate.php">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="text" readonly id="matricula" name="matricula" class="form-control" placeholder="Matrícula" value="<?php echo $data['mat_fun'] ?>" readonly>
                                        <label for="matricula">Matrícula</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input required type="text" id="nome" name="nome" class="form-control" placeholder="Nome completo" readonly value="<?php echo $data['nm_fun'] ?>">
                                        <label for="nome">Nome Completo</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input required type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" readonly value="<?php echo $data['cpf_fun'] ?>">
                                        <label for="cpf">CPF</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input required type="date" id="data-nascimento" name="data-nascimento" class="form-control" placeholder="Data de nascimento" readonly value="<?php echo $data['dt_nasc_fun']  ?>">
                                        <label for="data-nascimento">Data de nascimento</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="form-label-group">



                                        <input type="text" id="uf" name="uf" class="form-control" placeholder="UF" required value="<?php echo $data['uf_fun'] ?>">
                                        <label for="uf">Estado</label>


                                    </div>
                                </div>



                                <div class=" col-md-3">
                                    <div class="form-label-group">


                                        <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" required value="<?php echo $data['cid_fun'] ?>">
                                        <label for="cidade">Cidade</label>

                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-label-group">
                                        <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço" required value="<?php echo $data['end_fun'] ?>">
                                        <label for="endereco">Endereço</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input required type="text" id="telefone" maxlength="15" name="telefone" class="form-control" placeholder="Telefone" required value="<?php echo $data['tel_fun'] ?>">
                                        <label for="telefone">Telefone</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <select id="cargo" name="cargo" class="form-control">
                                            <?php foreach ($userController->listCargos() as $cargo) : ?>
                                                <option value="<?php echo $cargo['id_cargo'] ?>">
                                                    <?php echo $cargo['nm_cargo'] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                        <label for="cargo" class="d-none">Cargo</label>

                                        <!-- <input type="text" id="cargo" name="cargo" class="form-control"
                                            placeholder="cidade" required value="<?php echo $data['id_cargo'] ?>">
                                        <label for="cargo">Cargo</label> -->

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input required type="text" id="salario" name="salario" class="form-control" placeholder="Salário" required value="<?php echo $data['sal_fun'] ?>">
                                        <label for="salario">Salário</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="date" readonly id="data-cadastro" id="data-cadastro" name="data-cadastro" class="form-control" placeholder="Data do Cadastro" required value="<?php echo date('Y-m-d', strtotime($data['dt_admin'])); ?>">
                                        <label for="data-cadastro">Data do Cadastro</label>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="date" id="dataresc" name="dataresc" readonly class="form-control" placeholder="Data Termino de contrato" value="<?php echo $data['dt_rec_fun'] ?>" required>
                                        <label for="dataresc">Data Termino de contrato</label>
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
include_once 'includes/footers/footer-init.php';
include_once 'includes/footers/footer-modal.php';
include_once 'includes/footers/footer-scripts.php';
?>
<script src="./js/utils/IbgeUtils.js"></script>
<script src="./js/controller/FormController.js"></script>
<script>
    window.form = new FormController(document.querySelector('#user'));
</script>
<?php
include_once 'includes/footers/footer-final.php';
?>